<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::where('status','on')->get();
        return view('dashboard',compact('categories'));
    }

    public function show(Product $product)
    {
        return view('product',compact('product'));
    }
}
