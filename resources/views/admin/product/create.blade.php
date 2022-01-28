@extends('admin.layouts.admin-layout')

@section('content')
<div class="content-panel">
    <div class="container-fluid" style="padding: 0">
        <div class="row">

            <div class="col-md-9">
                <p class="title-form">افزودن محصول جدید</p>
                <form action="{{ route('admin.product.store') }}" class="my-form" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <input class="form-control inputbig" type="text" name="name" placeholder="عنوان را اینجا وارد کنید">
                    <br>

                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br>

                    <input class="form-control inputbig" type="text" name="price" placeholder="قیمت">
                    <br>

                    <input class="form-control inputbig" type="number" name="count" placeholder="تعداد را اینجا وارد کنید">
                    <br>

                    <input class="form-control inputbig" type="number" name="time" placeholder="زمان آماده سازی را به اینجا وارد کنید">
                    <br>

                    <div class="custom-control custom-switch">
                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">فعال/غیرفعال</label>
                    </div>
                    <br>

                    <textarea class="form-control" name="history" id="body" rows="12" placeholder="تاریخچه محصول را اینجا وارد کنید"></textarea>
                    <br>
                    
                    <div class="box-widget">
                        <h5>تصویر شاخص</h5>
                        <input type="file" name="img">
                    </div>
                    <hr>

                    <input type="submit" class="btn btn-primary" value="ارسال">

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
