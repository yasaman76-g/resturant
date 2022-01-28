@extends('layouts.layout')
@section('title')
صفحه اصلی
@endsection
@section('content')
<div class="main">
    <div class="row" style="text-align:center;float: right;">
        <div class="col-md-6">
            <img height="500" width="500" src="{{ $product->img }}" />
        </div>
        <div class="col-md-6">
            @php
                echo $product->history
            @endphp
        </div>
    </div>
</div>
@endsection