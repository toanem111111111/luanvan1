@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>


            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();

                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sp</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $total = 0;
                    @endphp

                    @foreach($content as $v_content)

                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="90" alt="" /></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                        <?php
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo number_format($subtotal).' '.'vnđ';
                                        ?>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                            <?php
                            $total+=$subtotal;
                            ?>

                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Thành tiền <span>{{number_format($total,0,',','.')}}đ</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <h4 style="margin:5px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>
            <div class="col-sm-2">
                <form method="POST" action="{{URL::to('/order-payment')}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default check_out" >Thanh toán Tiền mặt
                    </button>
                </form>
            </div>
            <form method="POST" action="{{url('/p-payment')}}">
                {{ csrf_field() }}
                <input type="hidden" name="total_vnpay" value="{{$total}}">

                <button type="submit" class="btn btn-default check_out" name="redirect">Thanh toán VNPAY
                </button>
            </form>

        </div>
    </section> <!--/#cart_items-->

@endsection
