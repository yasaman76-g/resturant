<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Helpers\HelperMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $count = $products->count();
        return view('admin.product.index',compact('products','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::where('status','on')->get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->img){
            $location='/uploads/products/';
            $img = HelperMethod::uploadfile($request->img,$location);
        }else{
            $img = "img/logo.jpg";
        }

        if(isset($request->status)){
            $status = $request->status;
        }else{
            $status = "off";
        }

        $product=Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'count' => $request->count,
            'time' => $request->time,
            'status' => $status,
            'history' => $request->history,
            'img' => $img,
        ]);

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $categories = Category::where('status','on')->get();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->img){
            $location='/uploads/products/';
            unlink(substr($product->img, 1));
            $img = HelperMethod::uploadfile($request->img,$location);
        }else{
            $img = $product->img;
        }

        if(isset($request->status)){
            $status = $request->status;
        }else{
            $status = "off";
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'count' => $request->count,
            'time' => $request->time,
            'status' => $status,
            'history' => $request->history,
            'img' => $img,
        ]);

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
