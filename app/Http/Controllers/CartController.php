<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Image;
use App\Models\Cart;

class CartController extends Controller
{
    /*
     * @var App\Repositories\Cart
     */

    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
//        $cart = app(CartRepository::class);
//        dd($cart);
        $this->cart->add(Image::find(1), 2);

        return $this->cart->all();


    }

}
