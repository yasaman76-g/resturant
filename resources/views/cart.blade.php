@extends('layouts.layout')
@section('title')
سبد خرید 
@endsection
@section('content')
<div class="col-md-12" id="cart">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
      @if ($message = Session::get('success'))
        <span class="help-block">{{$message}}</span>
      @endif
        <h3 class="text-3xl text-bold">سبد خرید</h3>
        <table class="table table-striped">
          <thead>
            <tr id="thead">
              <th scope="col">#</th>
              <th scope="col">نام محصول</th>
              <th scope="col">
                <span class="lg:hidden" title="Quantity">تعداد</span>/
                <span class="hidden lg:inline">ویرایش تعداد</span>
              </th>
              <th scope="col">قیمت</th>
              <th scope="col">حذف از سبد خرید</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($cartItems as $item)
            <tr>
              <td>
                <a href="#">
                  <img src="{{ $item->attributes->image }}" width="150" height="75">
                </a>
              </td>
              <td>
                <a href="#">
                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                  
                </a>
              </td>
              <td>
                <div class="h-10 w-28">
                  <div class="relative flex flex-row w-full h-8">
                    
                    <form action="{{ route('cart.update',$item->id) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="id" value="{{ $item->id}}" >
                      <input type="number" name="quantity" value="{{ $item->quantity }}" 
                      class="w-6 text-center bg-gray-300" />
                      <button type="submit"  class="btn btn-primary btn-xs">
                          <svg class="bi bi-pencil" width="1em" height="1em"
                                viewBox="0 0 16 16" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                    d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                    clip-rule="evenodd"></path>
                              <path fill-rule="evenodd"
                                    d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                    clip-rule="evenodd"></path>
                          </svg>
                      </button>
                    </form>
                  </div>
                </div>
              </td>
              <td>
                <span class="text-sm font-medium lg:text-base">
                    ${{ $item->price }}
                </span>
              </td>
              <td>
                <form action="{{ route('cart.destroy',$item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit"  class="btn btn-danger btn-xs">
                      <svg class="bi bi-trash" width="1.2em" height="1.2em"
                            viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"></path>
                          <path fill-rule="evenodd"
                                d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                clip-rule="evenodd"></path>
                      </svg>
                  </button>
              </form>
                
              </td>
            </tr>
            @endforeach
              
          </tbody>
        </table>
          مجموع قابل پرداخت: {{ Cart::getTotal() }}
          <button class="btn btn-success" onclick="getuserroute({{auth()->user()->id}});" @if (!auth()->user())
            disabled
          @endif>سفارش دهید</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="routeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="padding-left:350px">انتخاب مسیر</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('order.store') }}" method="POST">
              @csrf
              <label for="newroute">مسیر خود را وارد کنید</label>
              <input type="text" name="address" list="address" class="form-control"/>
              <datalist id="address">
              </datalist>
              <br>
              <hr>
              <button type="submit" class="btn btn-primary">ثبت سفارش</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection