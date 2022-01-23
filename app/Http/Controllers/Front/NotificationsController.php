<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        return view('Home.notifications', [
            'notifications' => $user->notifications()->paginate(),
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);

        $notification->markAsRead();

        if(isset($notification->data['url']) && $notification->data['url']){
            return redirect($notification->data['url']);
        }

        return redirect()->back();

    }

}
