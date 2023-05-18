<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view("register/index", [
            "active" => "register"
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => "required|min:5|max:30|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|max:25"
        ]);

        // dd($validatedData);

        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::create($validatedData);

        return redirect("/login")->with("success", "User successfully registered!");
    }
}
