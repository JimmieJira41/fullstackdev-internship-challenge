@extends('layout.mainlayout')
@section('title')
    Buy | Vending Machine
@endsection
@section('content')
    <div class="container">
        <div class="product_list">
            <div class="row mt-2">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1>Would you like something to drink ?</h1>
                        </div>
                    </div>
                </div>
                    <div class="col-12">
                        <div class="form-inline mb-4"> 
                            <label for="name_user">User</label>
                            <input type="text" name="name_user" class="name_user form-control ml-2" placeholder="Enter your name" required>
                            <span class="warning_name ml-2">please enter your name!</span>
                        </div>
                        
                    </div>
                <div class="col-8 mb-4 text-center">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>coin 10 Baht</h5>
                                </div>
                                <div class="card-body">
                                    <h1 class="num_coin10B">0</h1>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-warning coin" id="coin10B">10$</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>coin 5 Baht</h5>
                                </div>
                                <div class="card-body">
                                    <h1 class="num_coin5B">0</h1>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-warning coin" id="coin5B">5$</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>coin 2 Baht</h5>
                                </div>
                                <div class="card-body">
                                    <h1 class="num_coin2B">0</h1>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-warning coin" id="coin2B">2$</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>coin 1 Baht</h5>
                                </div>
                                <div class="card-body">
                                    <h1 class="num_coin1B">0</h1>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-warning coin" id="coin1B">1$</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card mb-2">
                        <div class="card-body text-center">
                            <h1 class="total_pocket display-1">0</h1>
                        </div>
                    </div>
                    <button class="col-12 btn btn-danger reset_coin">Reset</button>
                </div>
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1>Product List</h1>
                        </div>
                    </div>
                </div>
                @foreach($products as $product_list)
                <div class="col-3">
                    <div class="card mb-2">
                        <div class="card-header">
                            <strong>{{$product_list['name']}}</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{$product_list['image']}}" width="100%" style="max-height:115px" />
                            @if($product_list['in_stock'] == 1)
                            <div class="badge badge-success">Available</div>
                            @else
                            <div class="badge badge-danger">Unavailable</div>
                            @endif
                            <ul style="list-style:none;">
                                <li>price : {{$product_list['price']}}</li>
                            </ul>
                        </div>
                        <div class="card-footer text-right">
                            <input type="hidden" id="product{{$product_list['id']}}" value="{{$product_list['name']}}">
                            <input type="hidden" id="price{{$product_list['id']}}" value="{{$product_list['price']}}">
                            <input type="hidden" id="state{{$product_list['id']}}" value="{{$product_list['in_stock']}}">
                            <button class="btn btn-danger buy_product" id="{{$product_list['id']}}" >Buy</button>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>  
    </div>

@endsection