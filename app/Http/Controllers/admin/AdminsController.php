<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Gate::allows('admins.view')) {
            abort(403, 'You Are Not Authrized');
        }

        $users = User::where('user_type', '2')->where('id', '!=', auth::user()->id)->get();

        // Flash MSG
        $success = session()->get('success');

        // PRG [Post Redirect Get]
        return view('admin.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Gate::allows('admins.create')) {
            abort(403, 'You Are Not Authrized');
        }

        $countries = Country::all();
        $admin = User::get('country_id');
        // dd($admin);
        return view('admin.admins.create', compact('countries', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Rules
        $request->validate(User::adminValidateRules());

        $image_path = null;

        // Upload Image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);

        }else{
          $image_path = null;
        }

        // Create
        if ($request->post('password') === $request->post('re-password')) {
            $admin = User::create([
                'name' => $request->post('name'),
                'phone_number' => $request->post('phone_number'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'country_id' => $request->post('country'),
                'avatar' => $image_path,
                'user_type' => $request->post('admin'),
            ]);

            return redirect()->route('admin.index')->with('success', 'User ' . ($admin->name) . ' Created');
        } else {

            return redirect()->route('admin.create')->with('success', 'The Password Not Correct');
        };

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('admins.update')) {
            abort(403, 'You Are Not Authrized');
        }

        $admin = User::find($id);

        $countries = Country::all();

        if(!$admin) {
          abort(404);
        }

        return view('admin.admins.edit', compact('admin', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
   {
    //    dd($request);
        $admin = User::findOrFail($id);

        $request->validate(User::adminValidateRules());

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
        }


        // Check If THe Password Input Not Empty
        if( !empty($request->post('password')) && !empty($request->post('re-password')) ){
            if ($request->post('password') === $request->post('re-password')) {
                $request->merge([
                    'password' => Hash::make($request->post('password')) ?? $admin->password,
                ]);
                // dd($request->post('password'));
            }else{

                return redirect()->route('admin.index')->with('success', 'Password Not Correct');

            }
        }

        // dd($request);
        $admin->update([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'avatar' => $image_path ?? $admin->avatar,
            'country_id' => $request->post('country'),
        ]);

        return redirect()->route('admin.index')->with('success', 'User ' . $admin->name . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admins.delete')) {
            abort(403, 'You Are Not Authrized');
        }
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.index')->with('success', 'User ' . ($users->name) .  ' Deleted');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->where('user_type', '2')->get();
        return view('admin.admins.trash', compact('users'));
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $users = User::onlyTrashed()->findOrFail($id);
            $users->restore();

            // PTG
            return redirect()->route('admin.index')->with('success', 'User ' . $users->name . ' Restored');
        }

        $users = User::onlyTrashed()->restore();
        return redirect()->route('admin.index')->with('success', 'All User Restored');
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $users = User::onlyTrashed()->findOrFail($id);
            $users->forceDelete();

            // PTG
            return redirect()->route('admin.index')->with('success', 'User ' . $users->name . ' Deleted');
        }

        $users = User::onlyTrashed()->forceDelete();
        return redirect()->route('admin.index')->with('success', 'All User Deleted');
    }




}
