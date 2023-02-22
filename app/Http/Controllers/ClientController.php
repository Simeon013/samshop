<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home (){
        return view('client.home');
    }

    public function about (){
        return view('client.about');
    }

    public function contact (){
        return view('client.contact');
    }

    public function shop (){
        return view('client.shop');
    }

    public function cart (){
        return view('client.cart');
    }
}
