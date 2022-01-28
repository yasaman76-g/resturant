@extends('layouts.layout')
@section('title')
پیگیری سفارش
@endsection
@section('content')
<div class="main">
    <br>
    <br>
    <div class="col-md-8 offset-md-2" id="userorder">
            <div class="alert alert-secondary" role="alert">
                {{auth()->user()->name}} عزیز وضعیت سفارش شما 
                @if ($order->status == 'pending')
                    در حال بررسی 
                @elseif ($order->status == 'confirmed')   
                    تایید شده
                @elseif ($order->status == 'notConfirmed')  
                    تایید نشده
                @else
                    تحویل داده شده
                @endif
                است
                <br>
                <hr>
                @if ($order->comment)
                    {{$order->admin->name}} : @php echo $order->comment @endphp
                @endif
            </div>
            @if ($order->status == "confirmed")
                <button class="btn btn-primary" onclick="timer({{$order->products->max('time')}},'{{strtotime($order->confirmed_time)}}')">زمان باقیمانده تا آماده سازی سفارش</button>
            @endif
            <div id="response"></div>
    </div>
</div>
@endsection