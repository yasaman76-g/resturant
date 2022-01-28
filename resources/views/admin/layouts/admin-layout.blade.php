<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
<div class="topmenu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="sabtnam btn btn-danger">خروج</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="admin-container">
        <div class="row">
            <div class="col-md-2">
                <div class="admin-menu">
                    @include('admin.layouts.admin-munu')
                </div>
            </div>

            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

</body>
</html>