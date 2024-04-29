<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function shop()
    {
        return view('home.shop');
    }

    public function shopdetail()
    {
        return view('home.shopdetail');
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function checkout()
    {
        return view('home.checkout');
    }
}
