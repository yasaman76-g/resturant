@extends('admin.layouts.admin-layout')

@section('content')
<div class="content-panel">
    <div class="container-fluid" style="padding: 0">
        <div class="row">

            <div class="col-md-12">
                <p class="title-form">ویرایش دسته </p>
                <form action="{{ route('admin.category.update',$category->id ) }}" class="my-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-9">


                            <input class="form-control inputbig" type="text" name="name" value="{{ $category->name }}">
                            <br>

                            <div class="custom-control custom-switch">
                                <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" @if ($category->status == "on")
                                checked
                                @endif>
                                <label class="custom-control-label" for="customSwitch1">فعال/غیرفعال</label>
                            </div><br> <hr>

                            <input type="submit" class="btn btn-primary" value="ذخیره">


                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
