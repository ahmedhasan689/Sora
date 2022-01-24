<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    /**
     * @var \App\Http\Model\Subscription
     */

    public function index()
    {
        $subscription = Subscription::all();
    }

    /**
     * To Change subscription_id In users Table
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {

    }


}
