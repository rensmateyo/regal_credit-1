@extends('welcome')
@section('body')
<div id="appendmodal"></div>
<div class="wrapper">
    <div class="main-container">
        @include('navigation.sidebar')
        @yield('pages')
    </div>
</div>
@endsection