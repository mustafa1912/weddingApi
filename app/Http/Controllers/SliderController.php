<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        return view('slider.create');
    }

    public function Portfolio (){
        return view('portfolio.create');
    }
    public function Price (){
        return view('price.create');
    }public function client (){
        return view('client.create');
    }public function team (){
        return view('team.create');
    }public function artical (){
        return view('artical.create');
    }
    public function setting (){
        return view('companySetting.create');
    }
    public function categoury (){
        return view('categoury.create');
    }
}
