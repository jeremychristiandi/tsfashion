<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest();

        return view("components/products", [
            "products" => $products->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/create", [
            "products" => Product::all(),
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input("category"));

        $validate_data = $request->validate([
            "name" => "required|min:5",
            "price" => "required",
            "description" => "required|min:5",
            "image" => "image|file|max:12000",
            "category" => "required"
        ]);
        
        if($request->file("image")) {
            $validate_data["image"] = $request->file("image")->store("post-images");
        }

        $validate_data["category_id"] = $request->input("category");

        Product::create($validate_data);

        return redirect("/products")->with("success", "Product added successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("product", [
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("admin/update", [
            "product" => $product,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate_data = $request->validate([
            "name" => "required|min:5",
            "price" => "required",
            "description" => "required|min:5",
            "image" => "image|file|max:12000"
        ]);

        $validate_data["category_id"] = $request->input("category")-1;

        Product::where("id", $product->id)->update($validate_data);

        return redirect("/products")->with("success", "Product updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect("/products")->with("success", "Product deleted!");
    }
}
