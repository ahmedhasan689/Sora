<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Country;
use App\Models\User;
use App\Models\Role;


class SubadminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_admins = User::where('user_type', '1')->get();

        $success = session()->get('success');


        return view('admin.subadmins.index', compact('sub_admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.subadmins.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(User::SubadminValidateRules());

        if ($request->post('password') === $request->post('re-password')) {

            // $request->merge([
            //     'user_type' => 1,
            //     'password' => Hash::make($request->post('password'))
            // ]);

            $subadmin = User::create([
                'name' => $request->post('name'),
                'phone_number' => $request->post('phone_number'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'country_id' => $request->post('country'),
                'city' => $request->post('city'),
                'zip_code' => $request->post('zip_code'),
                'avatar' => $request->post('avatar'),
                'user_type' => 1,
            ]);

            return redirect()->route('subadmin.index')->with('success', 'User ' . ($subadmin->name) . ' Created');

        }else{
            return redirect()->route('subadmin.create')->with('success', 'Password Not Correct');
        }
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


    public function edit($id)
    {
        $subadmin = User::find($id);
        // $roles = Role::all();
        $countries = Country::all();
        return view('admin.subadmins.edit', compact('countries', 'subadmin'));
    }


    public function update(Request $request, $id)
    {
        $sub_admin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3|max:15',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
            'password' => 'nullable|min:6|max:20',
            'country' => 'required',
            'avatar' => 'nullable|Image',
        ]);

        // dd($request->post('role'));

        if ( !empty($request->post('password') && !empty($request->post('re-password')))) {
            if ($request->post('password') === $request->post('re-password')) {

            // Merge The Password If It Is Not Empty ...
                $request->merge([
                    'password' => Hash::make($request->post('password'))
                ]);
            }else{
                return redirect()->route('subadmin.edit')->with('success', 'Password Not Correct');
            }
        }
        
        $image_path = $sub_admin->avatar;

        // Upload Image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects
        
            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);       
        }else{
            $image_path = $sub_admin->avatar;
        }

        $sub_admin->update([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'country_id' => $request->post('country'),
            'city' => $request->post('city'),
            'zip_code' => $request->post('zip_code'),
            'avatar' => $image_path,
        ]);
        // dd($sub_admin);

        return redirect()->route('subadmin.index')->with('success', 'User ' . ($sub_admin->name) . ' Updated');





    }


    public function destroy($id)
    {
        $sub_admin = User::find($id);
        $sub_admin->delete();

        return redirect()->route('subadmin.index')->with('success', 'User ' . ($sub_admin->name) . ' Deleted');
    }

    public function trash()
    {
        $sub_admins = User::where('user_type', '1')->onlyTrashed()->get();
        return view('admin.subadmins.trash', compact('sub_admins'));
    }

    public function restore(Request $request, $id = null)
    {
        if ($id){
            $sub_admin = User::onlyTrashed()->findOrFail($id);
            $sub_admin->restore();

            return redirect()->route('subadmin.index')->with('success', 'Sub-Admin ' . ($sub_admin->name) . ' Restored');
        }

        $sub_admin = User::onlyTrashed()->restore();
        return redirect()->route('subadmin.index')->with('success', 'All Sub-Admins Are Restored');

    }

    public function forceDelete($id = null)
    {
        if ($id){
            $sub_admin = User::onlyTrashed()->findOrFail($id);
            $sub_admin->forceDelete();

            return redirect()->route('subadmin.index')->with('success', 'Sub-Admin ' . ($sub_admin->name) . ' Deleted');
        }

        $sub_admin = User::onlyTrashed()->forceDelete();
        return redirect()->route('subadmin.index')->with('success', 'All Sub-Admins Are Deleted');

    }










}
