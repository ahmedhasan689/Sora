<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $comments = Comment::all();
        return view('Home.front.home', [
            'posts' => $posts,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Home.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|min:5|max:250',
            'content' => 'nullable|min:5|max:500',
            'image' => 'required|mimes:jpeg,bmp,png,jpg,gif',
            'category_name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
        }

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'name' => $request->post('name'),
            'content' => $request->post('content'),
            'image_path' => $image_path,
            'category_id' => $request->post('category_name'),            
        ]);

        return redirect()->route('front.home')->with('success', 'The ' . $post->name . ' Published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);        
    }

    public function model($id)
    {
        return Post::findOrFail($id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);

        $categories = Category::all();
        return view('Home.post.edit', compact('posts', 'categories'));
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
        $post = Post::findOrFail($id);

        $request->validate([
            'name' => 'nullable|min:5|max:250',
            'content' => 'nullable|min:5|max:500',
            'image' => 'nullable|mimes:jpeg,bmp,png,jpg,gif',
            'category_name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
            // dd($request);
        }


        $post->update([
            'user_id' => Auth::user()->id,
            'name' => $request->post('name'),
            'content' => $request->post('content'),
            'image_path' => $image_path,
            'category_id' => $request->post('category_name'),          
        ]);

        return redirect()->route('front.home')->with('success', 'The ' . $post->name . ' Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        unlink(public_path('uploads' . '/' . $post->image_path));

        return redirect()->route('front.home')->with('success', 'The ' . $post->name . ' Deleted');

    }
}
