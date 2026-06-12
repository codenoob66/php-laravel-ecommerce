<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return Inertia::render("Products/Index", [
            "products"=> $products,
            ]);
    }

    public function show(Product $product)
    {
        return Inertia::render("Products/Show", [
            "product" => $product
        ]);
    }
}
