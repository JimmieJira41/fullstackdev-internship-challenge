<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products',$products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resp = Http::get('https://www.mocky.io/v2/5c77c5b330000051009d64c9');
        $data = $resp->getbody();
        $products = json_decode($data,true);
        return view('product.buy', ['products' => $products['data']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // name user
        $name_user = $_POST["name_user"];
        // detail product 
        $name_product = $_POST["name_product"];
        // coin
        $num_coin10B = $_POST["num_coin10B"];
        $num_coin5B = $_POST["num_coin5B"];
        $num_coin2B = $_POST["num_coin2B"];
        $num_coin1B = $_POST["num_coin1B"];
        $total_pocket = $_POST["total_pocket"];
        $price_product = $_POST["price_product"];
        // carry before coin
        $coin10B_carry = 0;
        $coin5B_carry = 0;
        $coin2B_carry = 0;
        $coin1B_carry = 0;
        // balance total pocket
        $balance_pocket = 0;
        $balance_coin10B = 0;
        $balance_coin5B = 0;
        $balance_coin2B = 0;
        $balance_coin1B = 0;
        if ($total_pocket >= $price_product) {
            while ($price_product != 0) {
                if ($price_product >= 10 && $coin10B_carry == 0) {
                    if ($num_coin10B != 0) {
                        $price_product = $price_product - 10;
                        $total_pocket = $total_pocket - 10;
                        $num_coin10B = $num_coin10B - 1;
                        // update coin in machine
                        $balance_pocket = $total_pocket - (($num_coin10B * 10) + ($num_coin5B * 5) + ($num_coin2B * 2) + ($num_coin1B * 1));
                        if ($balance_pocket != 0) {
                            if ($balance_pocket >= 10) {
                                $balance_pocket = $balance_pocket - 10;
                                $balance_coin10B = $balance_coin10B + 1;
                            }
                            if ($balance_pocket >= 5) {
                                $balance_pocket = $balance_pocket - 5;
                                $balance_coin5B = $balance_coin5B + 1;
                            }
                            if ($balance_pocket >= 2) {
                                $balance_pocket = $balance_pocket - 2;
                                $balance_coin2B = $balance_coin2B + 1;
                            }
                            if ($balance_pocket >= 1) {
                                $balance_pocket = $balance_pocket - 1;
                                $balance_coin1B = $balance_coin1B + 1;
                            }
                        }
                        $num_coin10B = $num_coin10B + $balance_coin10B;
                        $num_coin5B = $num_coin5B + $balance_coin5B;
                        $num_coin2B = $num_coin2B + $balance_coin2B;
                        $num_coin1B = $num_coin1B + $balance_coin1B;
                    } else {
                        $coin10B_carry = 1;
                    }
                    $balance_pocket = 0;
                    $balance_coin10B = 0;
                    $balance_coin5B = 0;
                    $balance_coin2B = 0;
                    $balance_coin1B = 0;
                }
                // price product more than ane equal 5 baht
                if ($price_product >= 5 && $coin5B_carry == 0) {
                    if ($num_coin5B != 0) {
                        $price_product = $price_product - 5;
                        $total_pocket = $total_pocket - 5;
                        $num_coin5B = $num_coin5B - 1;
                        // update coin in machine
                        $balance_pocket = $total_pocket - (($num_coin10B * 10) + ($num_coin5B * 5) + ($num_coin2B * 2) + ($num_coin1B * 1));
                        while ($balance_pocket != 0) {
                            if ($balance_pocket >= 10) {
                                $balance_pocket = $balance_pocket - 10;
                                $balance_coin10B = $balance_coin10B + 1;
                            }
                            if ($balance_pocket >= 5) {
                                $balance_pocket = $balance_pocket - 5;
                                $balance_coin5B = $balance_coin5B + 1;
                            }
                            if ($balance_pocket >= 2) {
                                $balance_pocket = $balance_pocket - 2;
                                $balance_coin2B = $balance_coin2B + 1;
                            }
                            if ($balance_pocket >= 1) {
                                $balance_pocket = $balance_pocket - 1;
                                $balance_coin1B = $balance_coin1B + 1;
                            }
                        }
                        $num_coin10B = $num_coin10B + $balance_coin10B;
                        $num_coin5B = $num_coin5B + $balance_coin5B;
                        $num_coin2B = $num_coin2B + $balance_coin2B;
                        $num_coin1B = $num_coin1B + $balance_coin1B;
                    } else {
                        if ($num_coin10B > 0) {
                            $num_coin10B = $num_coin10B - 1;
                            $num_coin5B = $num_coin5B + 2;
                            continue;
                        } else {
                            $coin5B_carry = 1;
                        }
                    }
                    $balance_pocket = 0;
                    $balance_coin10B = 0;
                    $balance_coin5B = 0;
                    $balance_coin2B = 0;
                    $balance_coin1B = 0;
                }
                // price product more than ane equal 2 baht
                if ($price_product >= 2 && $coin2B_carry == 0) {
                    if ($num_coin2B != 0) {
                        $price_product = $price_product - 2;
                        $total_pocket = $total_pocket - 2;
                        $num_coin2B = $num_coin2B - 1;
                        // update coin in machine
                        $balance_pocket = $total_pocket - (($num_coin10B * 10) + ($num_coin5B * 5) + ($num_coin2B * 2) + ($num_coin1B * 1));
                        while ($balance_pocket != 0) {
                            if ($balance_pocket >= 10) {
                                $balance_pocket = $balance_pocket - 10;
                                $balance_coin10B = $balance_coin10B + 1;
                            }
                            if ($balance_pocket >= 5) {
                                $balance_pocket = $balance_pocket - 5;
                                $balance_coin5B = $balance_coin5B + 1;
                            }
                            if ($balance_pocket >= 2) {
                                $balance_pocket = $balance_pocket - 2;
                                $balance_coin2B = $balance_coin2B + 1;
                            }
                            if ($balance_pocket >= 1) {
                                $balance_pocket = $balance_pocket - 1;
                                $balance_coin1B = $balance_coin1B + 1;
                            }
                        }
                        $num_coin10B = $num_coin10B + $balance_coin10B;
                        $num_coin5B = $num_coin5B + $balance_coin5B;
                        $num_coin2B = $num_coin2B + $balance_coin2B;
                        $num_coin1B = $num_coin1B + $balance_coin1B;
                    } else {
                        if ($num_coin5B > 0) {
                            $num_coin5B = $num_coin5B - 1;
                            $num_coin2B = $num_coin2B + 2;
                            $num_coin1B = $num_coin1B + 1;
                            continue;
                        } else {
                            $coin2B_carry = 1;
                        }
                    }
                    $balance_pocket = 0;
                    $balance_coin10B = 0;
                    $balance_coin5B = 0;
                    $balance_coin2B = 0;
                    $balance_coin1B = 0;
                }
                // price product more than ane equal 1 baht
                if ($price_product >= 1 && $coin1B_carry == 0) {
                    if ($num_coin1B != 0) {
                        $price_product = $price_product - 1;
                        $total_pocket = $total_pocket - 1;
                        $num_coin1B = $num_coin1B - 1;
                        // update coin in machine
                        $balance_pocket = $total_pocket - (($num_coin10B * 10) + ($num_coin5B * 5) + ($num_coin2B * 2) + ($num_coin1B * 1));
                        while ($balance_pocket != 0) {
                            if ($balance_pocket >= 10) {
                                $balance_pocket = $balance_pocket - 10;
                                $balance_coin10B = $balance_coin10B + 1;
                            }
                            if ($balance_pocket >= 5) {
                                $balance_pocket = $balance_pocket - 5;
                                $balance_coin5B = $balance_coin5B + 1;
                            }
                            if ($balance_pocket >= 2) {
                                $balance_pocket = $balance_pocket - 2;
                                $balance_coin2B = $balance_coin2B + 1;
                            }
                            if ($balance_pocket >= 1) {
                                $balance_pocket = $balance_pocket - 1;
                                $balance_coin1B = $balance_coin1B + 1;
                            }
                        }
                        $num_coin10B = $num_coin10B + $balance_coin10B;
                        $num_coin5B = $num_coin5B + $balance_coin5B;
                        $num_coin2B = $num_coin2B + $balance_coin2B;
                        $num_coin1B = $num_coin1B + $balance_coin1B;
                    } else {
                        if ($num_coin2B > 0) {
                            $num_coin2B = $num_coin2B - 1;
                            $num_coin1B = $num_coin1B + 2;
                            continue;
                        } else {
                            $coin1B_carry = 1;
                        }
                    }
                    $balance_pocket = 0;
                    $balance_coin10B = 0;
                    $balance_coin5B = 0;
                    $balance_coin2B = 0;
                    $balance_coin1B = 0;
                }
            }
            $data[] = array(
                "num_coin10B" => $num_coin10B,
                "num_coin5B" => $num_coin5B,
                "num_coin2B" => $num_coin2B,
                "num_coin1B" => $num_coin1B,
                "total_pocket" => $total_pocket,
                "title" => "Successful",
                "msg" => "Enjoy your drink",
                "icon" => "success"
            );
            $product = Product::create([
                'user' => $name_user,
                'product' => $name_product
            ]);

            header('Content-Type: application/json');
            return json_encode($data);
        }else{
            $data[] = array(
                "num_coin10B" => $num_coin10B,
                "num_coin5B" => $num_coin5B,
                "num_coin2B" => $num_coin2B,
                "num_coin1B" => $num_coin1B,
                "total_pocket" => $total_pocket,
                "title" => "Fail",
                "msg" => "Not enough money",
                "icon" => "error"
            );
            header('Content-Type: application/json');
            return json_encode($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
