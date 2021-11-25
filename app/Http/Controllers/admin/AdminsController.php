<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Subscription;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_type', '2')->get();

        // Flash MSG
        $success = session()->get('success');

        // PRG [Post Redirect Get]
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.create', compact('countries'));
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

        $request->merge([
            'user_type' => $request->post('admin'),
        ]);

        // Create
        if ( $request->post('password') === $request->post('re-password')) {

            // Hash The Password After Checked
            $request->merge([
                'password' => Hash::make($request->post('password')),
            ]);

            $admin = User::create($request->all());

            return redirect()->route('admin.index')->with('success', 'User ' . ($admin->name) . ' Created');
        }else{

            return redirect()->route('admin.create')->with('success', 'The Password Not Correct');

        };

        // return redirect()->route('admin.index')->with('success', 'User ' . ($admin->name) . ' Created');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
