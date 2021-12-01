<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Country;



class UsersController extends Controller
{

    public function index()
    {
        $users = User::where('user_type', '0')->get();

        // Read The Flash MSG
        $success = session()->get('success');

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
//        $users = User::all();
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

        $user = User::create([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'country_id' => $request->post('country'),
            'avatar' => $request->post('avatar'),
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
        $countries = Country::all();
        return view('admin.users.edit', compact('user','countries'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate(User::usersValidateRules());

        if( !empty($request->post('password')) && !empty($request->post('re-password')) ){
            if ($request->post('password') === $request->post('re-password')) {
                $request->merge([
                    'password' => Hash::make($request->post('password'))
                ]);
            }else{
                return redirect()->route('user.index')->with('success', 'Password Not Correct');
            }
        }

        $user->update([
                'name' => $request->post('name'),
                'phone_number' => $request->post('phone_number'),
                'email' => $request->post('email'),
                'password' => $request->post('password'),
                'country_id' => $request->post('country'),
        ]);

        return redirect()->route('user.index')->with('success', 'User ' . ($user->name) . ' Updated');
    }


    public function destroy($id)
    {
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
