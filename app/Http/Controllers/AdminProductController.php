<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.all_products',[
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.products.add_products',[
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product ??= new Product();

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $imageName = date('YmdHi').$request->file('thumbnail')->getClientOriginalName();  

        $attributes['thumbnail'] = $request->thumbnail->move(public_path('images/all_image'), $imageName);

        $attributes['thumbnail'] = $imageName;

        Product::create($attributes);

        return redirect('/admin/products')->with('success', 'You have successfully add product!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit_products', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'thumbnail' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Use "sometimes" to allow for optional thumbnail update
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        // Update attributes
        $product->update($attributes);

        // Handle thumbnail update if provided
        if (request()->hasFile('thumbnail')) {
            $imageName = date('YmdHi') . request()->file('thumbnail')->getClientOriginalName();
            request()->file('thumbnail')->move(public_path('images/all_image'), $imageName);
            $product->thumbnail = $imageName;
            $product->save();
        }

        return redirect('/admin/products')->with('success', 'You have successfully update product!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'You have successfully delete product!');
    }
}
