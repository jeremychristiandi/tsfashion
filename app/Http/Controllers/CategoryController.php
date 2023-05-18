<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index() {
        return view('components/category', [
            "categories" => Category::all()
        ]);
    }

    public function show(string $id) {
        // dd($id);
        $products = Product::where("category_id", $id)->get();    

        return view("components/products", [
            "products" => $products 
        ]);
    }
}
