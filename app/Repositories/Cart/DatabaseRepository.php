<?php

namespace App\Repositories\Cart;

use App\Models\Image;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DatabaseRepository implements CartRepository
{

    public function all()
    {
        return Cart::Where('cookie_id', $this->getCookieId())->orWhere('user_id', Auth::id())
            ->get();
    }

    public function add($item, $qty = 1)
    {
        return Cart::create([
            'id' => Str::uuid(),
            'cookie_id' => $this->getCookieId(),
            'image_id' => ($item instanceof Image) ? $item->id : $item,
            'user_id' => Auth::id(),
            'quantity' => $qty,
        ]);
    }

    public function clear()
    {
        return Cart::Where('cookie_id', $this->getCookieId())->orWhere('user_id', Auth::id())
            ->delete();
    }

    public function getCookieId()
    {
        $id = Cookie::get('cart_cookie_id');

        if(!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_cookie_id', $id, 60 * 24 * 30);
        }

        return $id;
    }

}
