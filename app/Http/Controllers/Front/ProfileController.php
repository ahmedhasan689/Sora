<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use integerValue;

use App\Models\Profile;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Followship;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::where('user_id', Auth::user()->id)->get();

        $posts = Post::where('user_id', '=', Auth::user()->id)->get();
        $comments = Comment::all();

        return view('Home.profile.index', compact('profiles', 'posts', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Home.profile.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $profiles = Profile::findOrFail($id);

        
        foreach ($profiles as $profile) {
            
            $user_id = $profiles->user_id;
            
        };

        $posts = Post::where('user_id', '=', $user_id)->get();
        $comments = Comment::all();

        

        $followed = Followship::where('follow_id', Auth::user()->id)->get();
        
        $follow = Followship::where('user_id', $user_id)->get();
        $followers = Followship::where('user_id', $user_id)->where('follow_id', Auth::user()->id)->get();
        
        // dd($followers);
   

        return view('Home.profile.show', compact('posts', 'comments', 'profiles', 'followers', 'followed', 'follow'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = Profile::findOrFail($id);
        $subscriptions = Subscription::all();
        // dd($profiles);
        return view('Home.profile.edit', compact('profiles', 'subscriptions'));
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
        $profile = Profile::findOrFail($id);
        $user = User::findOrfail(Auth::user()->id);

        
        $request->validate([
            'username' => 'required|string',
            'country' => 'nullable|string',
            'info' => 'nullable|min:5',
            'image_header' => 'nullable',
            'avatar' => 'nullable',
            'old_password' => 'nullable|min:8|max:20',
            'new_password' => 'nullable|min:8|max:20',
            'repeat_password' => 'nullable|min:8|max:20',
            'email' => 'nullable|email',
            'subscription' => 'nullable|integer', 
        ]);

        if($request->hasFile('image_header')){
            $file = $request->file('image_header');

            $image_path = $file->store('/', [
                'disk' => 'uploads'
            ]);
        }

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $avatar_path = $file->store('/', [
                'disk' => 'uploads'
            ]);
        }

        // dd($request);
        // Check Password

        $password_input = null;

        if ($request->post('old_password')) {
            if (Hash::check($request->old_password, Auth::user()->password) && $request->post('new_password') ==  $request->post('repeat_password') ) {
                    
                    $password_input =  Hash::make($request->post('new_password'));
            }
        }else {
            $password_input = $request->post('password');
        }

        if ($request->post('subscription')) {
            $request->merge([
                'subscription_id' => $request->post('subscription'),
            ]);          
        }

        // dd($request);

        if ($request->has('info') || $request->has('image_header') || $request->has('username') || $request->has('new_password') || $request->has('email') || $request->has('sub')) {

            $profile->update([
                'information' => $request->post('info'),
                'image_header' => $image_path ?? $profile->image_header,
            ]);

            $user->update([
                'name' => $request->post('username'),
                'avatar' => $avatar_path ?? $user->avatar,
                'password' => $password_input,
                'email' => $request->post('email'),
                'subscription_id' => $request->post('subscription'),
            ]);

            // dd($request);
        }
        
        return redirect()->route('profile.index');

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

    public function follow()
    {
        $fol = Followship::all();

        return view('Home.profile.index', compact('fol'));
    }













}
