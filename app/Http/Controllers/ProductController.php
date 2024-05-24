<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->filter(
                request(['search', 'category',])
                )->paginate(7),
            'categories' => Category::latest()->get(),
        ]);
    }
    public function show(Product $product) {
        return view('products.show',[
            'product' => $product
        ]);
    }
}
