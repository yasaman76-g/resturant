@extends('admin.layouts.admin-layout')

@section('content')
<div class="content-panel">
    <div class="container-fluid" style="padding: 0">
        <div class="row">

            <div class="col-md-9">
                <p class="title-form">ویرایش محصول </p>
                <form action="{{ route('admin.product.update',$product->id) }}" class="my-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input class="form-control inputbig" type="text" name="name" value="{{ $product->name }}">
                    <br>

                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                            @if ($category->id == $product->category_id)
                                selected
                            @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br>

                    <input class="form-control inputbig" type="text" name="price" value="{{ $product->price }}">
                    <br>

                    <input class="form-control inputbig" type="number" name="count" value="{{ $product->count }}">
                    <br>

                    <input class="form-control inputbig" type="number" name="time" value="{{ $product->time }}">
                    <br>

                    <div class="custom-control custom-switch">
                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1"
                        @if ($product->status == "on")
                            checked
                        @endif
                        >
                        <label class="custom-control-label" for="customSwitch1">فعال/غیرفعال</label>
                    </div>
                    <br>

                    <textarea class="form-control" name="history" id="body" rows="12">{{ $product->history }}</textarea>
                    <br>
                    
                    <div class="box-widget">
                        <h5>تصویر شاخص</h5>
                        <img src="{{$product->img}}" width="100" height="100">
                        <br><hr>
                        <input type="file" name="img">
                    </div>
                    <hr>

                    <input type="submit" class="btn btn-primary" value="ذخیره">

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
