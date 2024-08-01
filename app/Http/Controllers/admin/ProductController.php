<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::paginate(10);
        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $model = new Product();
        $model->fill($request->all());
        $model->images = uploadImage($request->file('images'), 'products');
        $model->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('model', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pro_name' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
        ]);

        $model = Product::find($id);
        $model->fill($request->all());
        if ($request->hasFile('images')) {
            $model->images = uploadImage($request->file('images'), 'products');
        }
        $model->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Product::find($id);
        $model->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
