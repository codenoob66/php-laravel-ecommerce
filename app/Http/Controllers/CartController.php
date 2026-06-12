<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $myCart = $request->session()->get('cart', []);
        $productId = $request->input("product_id");
        $quantity = $request->input("quantity");

        if (isset($myCart[$productId])) {
           $myCart[$productId] += $quantity; 
        } else {
           $myCart[$productId] = $quantity;
        }

        $request->session()->put('cart', $myCart);
        // dd($request->session()->get('cart'));
        return back();
    }

    public function index(Request $request)
    {
       $myCart = $request->session()->get('cart',[]);
       $productId = array_keys($myCart);
       $products = Product::whereIn('id', $productId)->get();

       foreach ($products as $product) {
        $product->quantity = $myCart[$product->id];
       }

       return Inertia::render('Products/Cart',[
           'cartItems' => $products
       ]);
    }
}