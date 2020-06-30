@extends('layout.mainlayout')

@section('title')
    Welcome | Vending Machine
@endsection

@section('content')
<div class="container">
    <div class="jumbotron text-center mt-2">
        <h1 class="display-1">
            Welcome to Vending Machine
        </h1>
        <a href="{{'/product'}}" class="btn btn-info">Let's go</a>
    </div>
</div>

@endsection
