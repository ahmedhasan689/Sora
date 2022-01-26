<?php

namespace App\Http\Controllers;

use App\Models\Followship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request)
    {  
        // dd($request);
        $follow = Followship::create([
            'user_id' => $request->post('user_id'),
            'follow_id' => $request->post('follow_id'),
        ]);

        return redirect()->back();
    }

}
