@extends('layouts.layout')
@section('title')
سفارشات
@endsection
@section('content')
<div class="main">
    <br>
    <br>
    @foreach ( $orders as $order )
        <div class="col-md-8 offset-md-2" id="userorder">
            <table class="table table-striped table-active">
                <thead>
                    <tr>
                        <th scope="col">نام محصول</th>
                        <th scope="col">تعداد</th>
                        <th scope="col">قیمت واحد</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $order->products as $product )
                        <tr>
                        <th>{{$product->name}}</th>
                        <td>{{$product->pivot->count}}</td>
                        <td>{{$product->price}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        {{-- <td>زمان آماده سازی سفارش:  {{$order->products->max('time')}}</td> --}}
                        <td>وضعیت سفارش : </td>
                        <td>
                            @if ($order->status == 'pending')
                                در حال بررسی 
                            @elseif ($order->status == 'confirmed')   
                                تایید شده
                            @elseif ($order->status == 'notConfirmed')  
                                تایید نشده
                            @else
                                تحویل داده شده
                            @endif
                        </td>
                        <td><a href="{{ route('order.show',$order->id) }}"><button class="btn btn-primary" type="button"> پیگیری سفارش</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
    @endforeach
</div>
@endsection