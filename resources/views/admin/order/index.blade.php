@extends('admin.layouts.admin-layout')

@section('content')
<div class="content-panel">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <span>  تعداد کل :   {{ $count }}</span>
                    </header>
                    @foreach ( $orders as $order )
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th scope="col">نام محصول</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">قیمت</th>
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
                                <td><a href="{{ route('admin.order.edit' , $order->id) }}" class="btn btn-primary btn-xs">
                                    <svg class="bi bi-pencil" width="1.2em" height="1.2em"
                                         viewBox="0 0 16 16" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                              clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd"
                                              d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a></td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </section>
            </div>
        </div>

    </div>
</div>
@endsection
