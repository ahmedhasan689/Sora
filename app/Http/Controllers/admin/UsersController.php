<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Country;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    // public function __construct()
    // {   
    //     $this->authorizeResource(User::class, 'id');
    // }




    public function index()
    {

        // dd(!Gate::allows('users.view'));

        if (!Gate::allows('users.view')) {
            abort(403, 'You Are Not Authrized');
        } 

        // $this->authorize('view-any', User::class);
        // dd($this->authorize('view-any', User::class));

        $users = User::where('user_type', '0')->get();

        // Read The Flash MSG
        $success = session()->get('success');

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        // If You Are Not Allow Gate::allow => true , !Gate::allow => false
        // if (!Gate::allows('users.create')) {
        //     abort(403, 'You Are Not Authrized');
        // }    
        $this->authorize('create', User::class);

        // $users = User::all();
        $countries = Country::all();
        return view('admin.users.create', compact('countries'));
    }


    public function store(Request $request)
    {
        
        $request->validate(User::usersValidateRules());

        if ($request->post('password') === $request->post('re-password')) {

            $request->merge([
                'password' => Hash::make($request->post('password'))
            ]);
        }

        //        $request->merge([
        //            'user_type' => 0,
        //        ]);

        // Upload Image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
        }
        $user = User::create([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'country_id' => $request->post('country'),
            'avatar' => $image_path,
            'user_type' => 0,
        ]);

        return redirect()->route('user.index')->with('success', 'User ' . ($user->name) . ' Created');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        
        $user = User::find($id);
        // $this->authorize('update', $user);
        $countries = Country::all();
        return view('admin.users.edit', compact('user', 'countries'));
    }


    public function update(Request $request, $id)
    {

        
        // $this->authorize('update', $id);
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'nullable|min:3|max:15',
            'phone_number' => 'nullable|numeric|min:10',
            'email' => 'nullable|email',
            'password' => 'nullable|min:6|max:20',
            'country' => 'nullable',
            'avatar' => 'nullable|Image',    
        ]);

        if( !empty($request->post('password')) && !empty($request->post('re-password')) ){
            if ($request->post('password') === $request->post('re-password')) {
                $request->merge([
                    'password' => Hash::make($request->post('password')) ?? $user->password,
                ]);
                // dd($request->post('password'));
            }else{

                return redirect()->route('user.index')->with('success', 'Password Not Correct');

            }
        }

        // Upload Image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
        }

        $user->update([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'country_id' => $request->post('country'),
            'avatar' => $image_path ?? $user->avatar,
        ]);

        return redirect()->route('user.index')->with('success', 'User ' . ($user->name) . ' Updated');
    }


    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User ' . ($user->name) . ' Deleted');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->where('user_type', '0')->get();
        return view('admin.users.trash', compact('users'));
    }

    public function restore(Request $request, $id)
    {
        if ($id) {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->restore();

            return redirect()->route('user.index')->with('success', 'User ' . ($user->name) . ' Restored');
        }

        $user = User::onlyTrashed()->restore();
        return redirect()->route('user.index')->with('success', 'All Users Restored');
    }

    public function forceDelete($id)
    {
        if ($id) {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->forceDelete();

            return redirect()->route('user.index')->with('success', 'User ' . ($user->name) . ' Deleted');
        }

        $user = User::onlyTrashed()->forceDelete();
        return redirect()->route('user.index')->with('success', 'All Users Deleted');
    }
}
