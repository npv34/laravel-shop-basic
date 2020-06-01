<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->add($id, $product);

        Session::put('cart', $cart);
        toastr()->success('Add to cart successfully!');
        return back();
    }
}
