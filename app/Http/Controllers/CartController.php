<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    //store
    public function store(Request $request)
    {
//        Session::forget('cart');
//        dd(session()->get('cart'));



        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $request->id => [
                    "name" => $product->pro_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->images
                ]
            ];
            session()->put('cart', $cart);
            return response()->json([
                'status' => 200,
                'cart' => $cart,
                'success' => 'Product added to cart successfully!'
            ]);
        }
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json([
                'status' => 200,
                'cart' => $cart,
                'success' => 'Product added to cart successfully!'
            ]);
        }
        $cart[$request->id] = [
            "name" => $product->pro_name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->images
        ];
        session()->put('cart', $cart);
        return response()->json([
            'status' => 200,
            'cart' => $cart,
            'success' => 'Product added to cart successfully!'
        ]);
    }

    //destroy
    public function destroy(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json([
                'status' => 200,
                'cart' => $cart,
                'success' => 'Product removed from cart successfully!'
            ]);
        }
    }

    //remove all

    public function removeAll()
    {
        session()->forget('cart');
        return response()->json([
            'status' => 200,
            'success' => 'All products removed from cart successfully!'
        ]);
    }

    //update

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json([
                'status' => 200,
                'cart' => $cart,
                'success' => 'Cart updated successfully!'
            ]);
        }
    }
}
