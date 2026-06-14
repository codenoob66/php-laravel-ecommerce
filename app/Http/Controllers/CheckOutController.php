<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckOutController extends Controller
{
    public function index(Request $request)
    {
        $myCart = $request->session()->get('cart', []);
        $productIds = array_keyS($myCart);
        $products = Product::whereIn('id', $productIds)->get();

        $grandTotal = 0;
        $totalQuantity = 0;

        // dd($products);
        foreach ($products as $product) {
            $price = $product->price;
            $product->quantity = $myCart[$product->id];

            $grandTotal += $price * $product->quantity;
            $totalQuantity += $product->quantity;
        }


        return inertia('Cart/CheckOut', [
            'products' => $products,
            'grandTotal' => $grandTotal,
            'quantity' => $totalQuantity

        ]);

    }
}
