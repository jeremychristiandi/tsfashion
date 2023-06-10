<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class CategoryController extends Controller
{
    public function index() {
        return view('components/category', [
            "categories" => Category::all()
        ]);
    }

    public function show(string $id) {
        // dd($id);
        $products = Product::where("category_id", $id);

        return view("components/products", [
            // "products" => $products 
            "products" => $products->latest()->filter(request(["search"]))->paginate(9)
        ]);
    }

    public function addToCart(Request $request) {
        $userId = auth()->id();
        $productId = $request->input("product_id");
        $quantity = $request->input("quantity");

        if(Cart::where('product_id', $productId)->exists()) {
            return redirect("/categories")->with("cartFailed", "Product already exists in cart!");
        }

        Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);

        return redirect("/categories")->with("success", "Product added to cart!");
    }
}
