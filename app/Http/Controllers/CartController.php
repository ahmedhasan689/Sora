<?php

namespace App\Http\Controllers;

use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

use App\Models\Image;

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
