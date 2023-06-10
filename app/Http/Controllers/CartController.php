<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("components/cart", [
            "carts" => Cart::where("user_id", auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->id();
        $productId = $request->input("product_id");
        $quantity = $request->input("quantity");

        if(Cart::where('product_id', $productId)->exists()) {
            return redirect("/products")->with("cartFailed", "Product already exists in cart!");
        }

        Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);

        return redirect("/products")->with("success", "Product added to cart!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("components/cart", [
            "cart" => $cart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        // Cart::destroy($cart->id);

        return redirect("/cart")->with("success", "Successfully delete item!");
    }

    public function checkout() {
        $carts = Cart::where("user_id", auth()->id())->get();
        
        foreach($carts as $cart) {
            $cart->destroy($cart->id);
        }

        return redirect("/cart")->with("success", "Transaction has been made!");
    }
}
