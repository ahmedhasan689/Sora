<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Profile;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

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
    public function show($id)
    {

        // $profile = Profile::where('id', $id)->first();
        // dd($profile);
       
        // return view('Home.profile.index', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('home.profile.edit', compact('profile'));
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
        
        // $request->validate([
        //     'username' => 'required|string',
        //     'country' => 'nullable|string',
        //     'information' => 'nullable|min:5',
        //     'image_header' => 'nullable',
        // ]);

        if($request->hasFile('image_header')){
            $file = $request->file('image_header');

            $image_path = $file->store('/', [
                'disk' => 'uploads'
            ]);
        }

        if ($request->has('informatin') || $request->has('image_header') || $request->has('username')) {
            $profile->update([
                'information' => $request->post('information'),
                'image_header' => $image_path,
            ]);
            $user->update([
                'name' => $request->post('username'),
                // 'name' => $request->post('country'),
            ]);
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
}
