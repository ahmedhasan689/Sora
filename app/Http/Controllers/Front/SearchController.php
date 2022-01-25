<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\User;

class SearchController extends Controller
{
    function search(Request $request)
    {
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $posts = Post::where('name', 'LIKE', '%' . $search_text . '%')->get();
            $users = User::where('name', 'LIKE', '%' . $search_text . '%')->get();

            $profiles = Profile::all();
            $comments = Comment::all();

            $user = User::all();

            return view('Home.search', compact('posts', 'comments', 'user', 'users', 'profiles'));

        }else{
            $posts = Post::all();

            $comments = Comment::all();

            return view('Home.search', compact('posts', 'comments'));
        }
    }
}
