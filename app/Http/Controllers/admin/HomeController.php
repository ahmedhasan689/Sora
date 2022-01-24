<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() 
    {
        $users = User::where('user_type', '0')->get();
        $subadmins = User::where('user_type', '1')->get();
        $categories = Category::all();
        $posts = Post::all();
        $admin = User::where('user_type', '2')->get();


        return view('layouts.home', compact('users', 'categories', 'posts', 'subadmins', 'admin'));
    }


    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.home.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {

    }


}
