@extends('layout.mainlayout')

@section('title')
    Home | Vending Machine
@endsection

@section('content')
<?php 
$sales = count($products);
?>
<div class="container">
    <div class="row mt-2">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Welcome to Vending Machine</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-header text-center">
                    <h3>SALES</h3><i class="fas fa-trophy"></i>    
                </div>
                <div class="card-body text-center text-light bg-warning">
                    <h3><?php echo $sales ?></h3>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h1>History of sales</h1>
                    <div class="scollbar">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Date of buy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $products as $product)
                                <tr>
                                    <th scope="row">{{$product['id']}}</th>
                                    <td scope="row">{{$product['user']}}</td>
                                    <td scope="row">{{$product['product']}}</td>
                                    <td scope="row">{{$product['created_at']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection
