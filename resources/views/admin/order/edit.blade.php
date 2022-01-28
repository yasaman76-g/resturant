@extends('admin.layouts.admin-layout')

@section('content')
<div class="content-panel">
    <div class="container-fluid" style="padding: 0">
        <div class="row">

            <div class="col-md-12">
                <p class="title-form">ویرایش سفارش </p>
                <form action="{{ route('admin.order.update',$order->id ) }}" class="my-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-9">
                            وضعیت سفارش :
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="confirmed" id="status1"
                                @if ( $order->status == "confirmed" )
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="status1">
                                 تایید شده
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="notConfirmed" id="status2"
                                @if ( $order->status == "notConfirmed" )
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="status2">
                                تایید نشده
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="received" id="status2"
                                @if ( $order->status == "received" )
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="status2">
                                تحویل داده شده
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="pending" id="status2"
                                @if ( $order->status == "pending" )
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="status2">
                                در حال بررسی
                                </label>
                            </div>
                            <br>
                            علت تغییر وضعیت سفارش:
                            <textarea class="form-control" name="comment" >{{ $order->comment }}</textarea>
                            <br>
                            <hr>

                            <input type="submit" class="btn btn-primary" value="ذخیره">


                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
