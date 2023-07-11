@extends('layout_admin')
@section('admin_content')
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin đăng nhập
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$customer->name_customer}}</td>
                        <td>{{$customer->phone_customer}}</td>
                        <td>{{$customer->email_customer}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển hàng
            </div>


            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình thức thanh toán</th>


                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td>{{$shipping->name}}</td>
                        <td>{{$shipping->address}}</td>
                        <td>{{$shipping->phone}}</td>
                        <td>{{$shipping->email}}</td>
                        <td>{{$shipping->note}}</td>
                        <td>@if($payment->name_payment=='Tiền mặt') Tiền mặt @else Chuyển Khoản @endif</td>


                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br><br>

    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê chi tiết đơn hàng
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
{{--                        <th style="width:20px;">--}}
{{--                            <label class="i-checks m-b-none">--}}
{{--                                <input type="checkbox"><i></i>--}}
{{--                            </label>--}}
{{--                        </th>--}}
                        <th>Tên sản phẩm</th>
{{--                        <th>Số lượng </th>--}}
{{--                        <th>Mã giảm giá</th>--}}
{{--                        <th>Phí ship hàng</th>--}}
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Tổng tiền</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach($order_details as $key => $details)

                        @php
                            $subtotal = $details->price * $details->quantity;
                        @endphp
                        <tr class="color_qty_{{$details->id_product}}">

{{--                            <td><i>{{$i}}</i></td>--}}
                            <td>{{$details->name_product}}</td>
{{--                            <td>{{$details->quantity}}</td>--}}
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{URL::to('/update-order/'.$details->id_detailsorder)}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" value="{{$details->quantity}}" name="quantity" class="form-control"  >
                                        <input type="submit" value="Cập nhật" name="update_order" class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td>{{number_format($details->price ,0,',','.')}}đ</td>
                            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
                        </tr>
                            <?php
                            $total+=$subtotal;
                            ?>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            @foreach($order as $key=>$o)

                                <form action="{{URL::to('/update-status/'.$o->id_order)}}" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tổng tiền <input type="text" value="{{number_format($total,0,',','.')}}" name="total_order">VNĐ</label>
                                </div>
                                <h4 style="margin:10px 0;font-size: 20px;">Cập nhật trạng thái</h4>
                                    {{ csrf_field() }}
                                    <div class="payment-options">
                                    <span>
                                        <label><input name="payment_option" value="Chưa xử lý" type="checkbox"> Chưa xử lý</label>
                                    </span>
                                        <span>
                                        <label><input name="payment_option" value="Đã xử lý và giao hàng" type="checkbox">Đã xử lý và giao hàng</label>
                                    </span>
                                        <span>
                                        <label><input name="payment_option" value="Hủy" type="checkbox"> Hủy</label>
                                    </span>
                                        <input type="submit" value="Cập nhật" name="send_order_place" class="btn btn-primary btn-sm">
                                    </div>
                                </form>
                            @endforeach

                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
