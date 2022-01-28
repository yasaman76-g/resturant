@extends('layouts.layout')
@section('title')
صفحه اصلی
@endsection
@section('content')
<div class="main">
    <div class="main-slider">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <a target="_blank" href="#"><img src="img/persianfood.jpg" alt="bootstrap course"/></a>
                <span><a href="#">ایرانی </a></span>
            </div>
            <div class="item">
                <a target="_blank" href="#"><img src="img/fastfood.jpg"/></a>
                <span><a href="#">فست فود</a></span>
            </div>
            <div class="item">
                <a target="_blank" href="#"><img src="img/turkish-food.jpg" alt="websoft3"/></a>
                <span><a href="#">بین الملل</a> </span>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@foreach ($categories as $category)
    @if (count($category->products) > 0)
    <div class="title-main">
        <h4>{{$category->name}}</h4>
    </div>

    <div class="container-fluid post-container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                    @foreach ($category->products as $product)
                        <div class="col-sm-12 col-md-3 maghale">
                            <div class="thumbnail">
                                <div id="newsimg">
                                    <img src="{{$product->img}}" alt="..." id="news">
                                </div>
                                <div class="caption">
                                    <h5 class="text">{{$product->name}}</h5>
                                    <h6 class="text">تعداد : {{$product->count}}</h6>
                                    <a class="text" href="{{ route('product',$product->id) }}" dideo-checked="true">مشاهده جزئیات</a>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->img }}"  name="img">
                                        <input type="hidden" value="1" name="count">
                                        <div id="newsbtn">
                                            <button class="btn btn-success" type="submit" @if (!auth()->user())
                                                disabled
                                            @endif>سفارش دهید</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    {{-- <div class="paginate">{{$articles->links()}}</div> --}}
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach

<br>
<br>
@endsection