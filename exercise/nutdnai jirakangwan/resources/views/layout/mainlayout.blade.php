<!doctype html>
<html lang="en">

<head>
   @include('layout.partials.header')
</head>

<body>
    {{-- navbar --}}
    <div name="navbar">
        @include('layout.partials.nav')
    </div>

    {{-- content --}}
    <div name="content">
        @yield('content')
    </div>

    {{-- footer --}}
    <div name="footer">
        @include('layout.partials.footer')
    </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script>
            $(document).ready(function() {
                var num_coin10B = 0;
                var num_coin5B = 0;
                var num_coin2B = 0;
                var num_coin1B = 0;
                var total_pocket = 0;
                $(".warning_name").css("color","white");
                $(".name_user").change(function(){
                  $(".warning_name").css("color","white");  
                });
                $(".coin").on("click", function() {
                    var check_coin = $(this).attr('id');
                    switch (check_coin) {
                        case 'coin10B':
                            num_coin10B = parseInt(num_coin10B) + 1;
                            $(".num_coin10B").text(num_coin10B);
                            check_coin = "";
                            total_pocket = parseInt(total_pocket) + 10;
                            $(".total_pocket").text(total_pocket);
                            break;
                        case 'coin5B':
                            num_coin5B = parseInt(num_coin5B) + 1;
                            $(".num_coin5B").text(num_coin5B);
                            check_coin = "";
                            total_pocket = parseInt(total_pocket) + 5;
                            $(".total_pocket").text(total_pocket);
                            break;
                        case 'coin2B':
                            num_coin2B = parseInt(num_coin2B) + 1;
                            $(".num_coin2B").text(num_coin2B);
                            check_coin = "";
                            total_pocket = parseInt(total_pocket) + 2;
                            $(".total_pocket").text(total_pocket);
                            break;
                        case 'coin1B':
                            num_coin1B = parseInt(num_coin1B) + 1;
                            $(".num_coin1B").text(num_coin1B);
                            check_coin = "";
                            total_pocket = parseInt(total_pocket) + 1;
                            $(".total_pocket").text(total_pocket);
                            break;
                    }

                });
                $(".detail_product").on("click", function() {
                    var id_product = $(this).attr("id");
                    // alert(id_product);
                    $.ajax({
                        type: "GET",
                        url: "/detail-product",
                        data: {
                            id_product: id_product
                        },
                        success: function(response) {
                            // alert(data);
                        }
                    });
                });
                $(".buy_product").on("click", function() {
                    var id_product = $(this).attr("id");
                    var price_product = $("#price"+id_product).val();
                    var name_product = $("#product"+id_product).val();
                    var state_product = $("#state"+id_product).val();
                    var name_user = $(".name_user").val();
                    if( name_user == ''){
                        $(".warning_name").css("color","red")
                        swal({
                        title: "Warning",
                        text: "Please enter your name!",
                        icon: "warning",
                        });
                    }else{
                        if( state_product == 1){
                        $.ajax({
                            type: "POST",
                            url: "buy-product",
                            data: {
                                _token: "{{ csrf_token() }}",
                                name_user: name_user,
                                name_product: name_product,
                                total_pocket: total_pocket,
                                price_product: price_product,
                                num_coin10B: num_coin10B,
                                num_coin5B: num_coin5B,
                                num_coin2B: num_coin2B,
                                num_coin1B: num_coin1B
                            },
                            // contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function(response) {
                                swal({
                                    title: response[0].title,
                                    text: response[0].msg,
                                    icon: response[0].icon,
                                    });
                                console.log(response[0].num_coin10B);
                                num_coin10B = response[0].num_coin10B;
                                num_coin5B = response[0].num_coin5B;
                                num_coin2B = response[0].num_coin2B;
                                num_coin1B = response[0].num_coin1B;
                                total_pocket = response[0].total_pocket;
                                $(".num_coin10B").text(num_coin10B);
                                $(".num_coin5B").text(num_coin5B);
                                $(".num_coin2B").text(num_coin2B);
                                $(".num_coin1B").text(num_coin1B);
                                $(".total_pocket").text(total_pocket);

                            }
                        });
                        }else{
                            swal({
                                title: "Fail",
                                text: "The product is unavailable",
                                icon: "warning",
                                });
                        }
                    }
                });
                $(".reset_coin").on("click", function() {
                    num_coin10B = 0;
                    num_coin5B = 0;
                    num_coin2B = 0;
                    num_coin1B = 0;
                    total_pocket = 0;
                    $(".num_coin10B").text(num_coin10B);
                    $(".num_coin5B").text(num_coin5B);
                    $(".num_coin2B").text(num_coin2B);
                    $(".num_coin1B").text(num_coin1B);
                    $(".total_pocket").text(total_pocket);
                });
            });
        </script>
</body>

</html>