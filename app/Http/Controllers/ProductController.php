<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('client.shop', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('client.single-product', compact('product'));
    }
}
