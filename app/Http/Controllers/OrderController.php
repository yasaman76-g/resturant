<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Route;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //if this address is new insert in routes table
        $route = Route::firstOrCreate(
            [
                'address' => $request->address, 
                'user_id' => auth()->user()->id,
            ],
        );

        $order = Order::create(
            [
                'route_id' => $route->id,
                'user_id' => auth()->user()->id,
                'status' =>'pending',
            ]
        );

        $cartitems = \Cart::getContent();
        foreach($cartitems as $cartitem){
            $order->products()->attach($cartitem->id, ['count' => $cartitem->quantity]);
        }

        \Cart::clear();

        session()->flash('success_order', 'سفارش شما با موفقیت ثبت گردید');
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
