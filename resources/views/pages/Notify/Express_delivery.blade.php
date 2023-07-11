@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">

            <div class="review-payment">
                <div class="news-detail-content">
                    <style type="text/css">
                        .inner-prod .inner-prod-row{
                            max-width: 600px;
                            margin:10px auto;
                            border:1px solid #eee;
                            padding: 10px 5px;
                        }
                        .inner-prod .inner-prod-row:after{
                            content:'';
                            display:block;
                            clear:both;
                        }
                        .inner-prod .inner-prod-row .inner-prod-img img{
                            width:150px;
                            height:150px;
                        }
                        .inner-prod .inner-prod-row .inner-prod-img{
                            float:left;
                            width: 36%;
                            text-align:center;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info{
                            float:right;
                            width: 64%;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info a{
                            font-size:16px;
                            font-weight:bold;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info a:hover{
                            text-decoration: none;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info .inner-prod-price{
                            color: #ff1b1b;
                            font-size: 18px;
                            font-weight: bold;
                            margin-bottom: 20px;
                        }
                        a.inner-view-details {
                            text-transform: uppercase;
                            font-size: 14px !important;
                            background: #288ad6;
                            color: #fff;
                            text-decoration: none;
                            padding: 7px 15px;
                        }
                        .ct-toc {
                            background: #fef8ea;
                            margin-bottom: 15px;
                            float: left;
                            margin-top: 15px !important;
                        }
                        .ct-toc .ct-toc-header{
                            padding: 5px 15px;
                            border-radius: 8px 8px 0px 0px;
                            font-size: 15px;
                        }
                        .ct-toc .ct-toc-header span:nth-child(1){
                            display: none;
                        }
                        .ct-toc .ct-toc-header a{
                            font-size: 13px;
                            font-weight: normal;
                            color: #a23133;
                        }
                        .ct-clear:before{
                            content: '';
                            display: block;;
                            clear: both;;
                        }
                        .ct-toc .ct-toc-header:after{
                            content: '';
                            display: block;
                            clear: both;
                        }
                        .ct-toc ol{
                            margin: 0px;
                            padding-left: 30px;
                            counter-reset: section;
                            list-style-type: none;
                            list-style: none;
                            padding-right: 30px;
                        }
                        @media(max-width: 991px){
                            .ct-toc ol{
                                padding-left: 15px;
                                padding-right: 15px;
                            }
                        }
                        .ct-toc ol li{
                            margin-bottom: 0px;
                        }
                        .ct-toc ol li:last-child{
                            margin-bottom: 10px;
                        }
                        .ct-toc ol li a::before{
                            counter-increment: section;
                            content: counters(section, ".") "  ";
                            font-size: 15px;
                        }
                        .ct-toc ol li::before:hover{
                            color: #3366cc;
                        }
                        .ct-toc ol li a{
                            font-family: arial;
                            position: relative;
                            font-size: 15px;
                            font-weight: normal !important;
                            color: #a23133;
                        }
                        .ct-toc ol li a:hover{
                            color: #000;
                            text-decoration: none;
                        }
                        .ct-toc ol li i{
                            color: #000;
                            font-size: 4px;
                            margin-right: 4px;
                            position: absolute;
                            left: -10px;
                            top: 7px;
                        }
                        /*.ct-toc-wrp{
                          display: none;
                        }*/
                        .ct-toc-wrp > ol > li > a{
                            font-weight: bold;
                        }
                        .ct-toc-wrp > ol > li::before{
                            font-weight: bold;
                        }
                        .ct-fa-right {
                            float: right;
                            line-height: 19px;
                            margin-top: 3px;
                        }
                        .ct-end-toc{
                            width: 100%;
                            height: 1px;
                            background: transparent;
                        }
                        .inner-prod .inner-prod-row{
                            max-width: 600px;
                            margin:10px auto;
                            border:1px solid #eee;
                            padding: 10px 5px;
                        }
                        .inner-prod .inner-prod-row:after{
                            content:'';
                            display:block;
                            clear:both;
                        }
                        .inner-prod .inner-prod-row .inner-prod-img img{
                            width:150px;
                            height:150px;
                        }
                        .inner-prod .inner-prod-row .inner-prod-img{
                            float:left;
                            width: 36%;
                            text-align:center;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info {
                            float: right;
                            width: 64%;
                            padding-left: 10px;
                            text-align: left;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info a{
                            font-size:18px;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info a:hover{
                            text-decoration: none;
                        }
                        .inner-prod .inner-prod-row .inner-prod-info .inner-prod-price{
                            color: #ff5400;
                            font-size: 18px;
                            font-weight: bold;
                            margin-bottom: 20px;
                        }
                        a.inner-view-details {
                            text-transform: uppercase;
                            font-size: 14px !important;
                            background: #288ad6;
                            color: #fff;
                            text-decoration: none;
                            padding: 7px 15px;
                        }
                        .inner-prod-price-oos{
                            font-weight: normal;
                            color:#ccc;
                        }
                        .inner-cat, .inner-tag{
                            display: flex;
                            justify-content: space-between;
                            margin: 15px 0px;
                            border: 1px solid #48b66e;
                            padding: 10px 15px;
                            position: relative;
                            margin-top: 40px;
                            border-top: 2px solid #48b66e;
                        }
                        .inner-cat .inner-prod-row, .inner-tag .inner-prod-row{
                            width: calc(45% - 30px);
                        }
                        .inner-cat .inner-prod-img, .inner-tag .inner-prod-img{
                            width: 100px;
                        }
                        .inner-cat .inner-prod-img img, .inner-tag .inner-prod-img img{
                            border-radius: 15px;
                        }
                        .inner-cat .inner-prod-row, .inner-tag .inner-prod-row{
                            display: flex;
                        }
                        .inner-cat .inner-prod-row .inner-prod-info, .inner-tag .inner-prod-row .inner-prod-info{
                            text-align: left;
                            padding: 0px 10px;
                            width: calc(100% - 100px);
                        }
                        .inner-cat .inner-prod-row .inner-prod-info a, .inner-tag .inner-prod-row .inner-prod-info a{
                            font-size: 16px;
                        }
                        .inner-cat .inner-prod-row .inner-prod-info .inner-prod-price, .inner-tag .inner-prod-row .inner-prod-info .inner-prod-price{
                            font-size: 16px;
                            color: #ff5400;
                            font-weight: bold;
                        }
                        .inner-cat a:hover, .inner-tag a:hover{
                            text-decoration: none;
                        }
                        .inner-cat .ct-viewmore, .inner-tag .ct-viewmore{
                            font-size: 20px;
                            display:flex;
                            justify-content: center;
                            align-items: center;
                        }
                        .inner-cat .ct-viewmore a, .inner-tag .ct-viewmore a{
                            background: #288ad6;
                            color: #fff;
                            text-decoration: none;
                            padding: 7px 15px;
                            font-size: 14px;
                        }
                        a.ct-title-block {
                            color: #000;
                        }
                        a.ct-title-block:hover{
                            color: #2478AF;
                        }
                        .inner-cat-name {
                            position: absolute;
                            left: -1px;
                            top: -30px;
                            background: #48b66e;
                            padding: 1px 36px 1px 10px;
                            border: 1px solid #48b66e;
                            border-radius: 0px 50px 0px 0px;
                        }
                        .inner-cat-name a{
                            color: #fff;
                            font-size: 16px;
                        }
                        .ct-news-prod.ct-mobile{
                            display:none;
                        }
                        .ct-news-prod:after{
                            content: '';
                            display: block;
                            clear: both;
                        }
                        .ct-news-prod .ct-col-left img{
                            width: 190px;
                            height: 170px;
                            object-fit: cover;
                        }
                        .ct-news-prod{
                            padding: 25px 0px;
                            border-top: 1px dashed #e7e7e7;
                            margin: 8px 0px;
                            border-bottom: 1px dashed #e7e7e7;
                        }
                        .ct-news-prod .ct-col-left{
                            width: 190px;
                            float: left;
                        }
                        .ct-news-prod .ct-col-right{
                            width: calc(100% - 190px);
                            float: right;
                            padding-left: 20px;
                        }
                        .ct-news-prod .ct-col-right .ct-title{
                            font-size: 18px;
                            font-weight: bold;
                        }
                        .ct-news-prod .ct-col-right .ct-status{
                            color: green;
                            font-size: 15px;
                            margin: 5px 0px;
                        }
                        .ct-news-prod .ct-col-right .ct-status i{
                            margin-right: 5px;
                        }
                        .ct-news-prod .ct-col-right p{
                            line-height: 20px;
                            font-size: 14px;
                        }
                        .ct-news-prod .ct-col-left .ct-price{
                            color: #767875;
                            font-size: 16px;
                            margin-top: 15px;
                        }
                        .ct-news-prod .ct-col-left .ct-price span{
                            color: #ff4f47;
                            font-size: 20px;
                            font-weight: normal;
                            float: none;
                        }
                        .ct-news-prod .ct-col-left .ct-unit{
                            color: #767875;
                            font-size: 15px;
                        }
                        .ct-news-prod .ct-col-left .buy-btn-detail, .ct-news-prod.ct-mobile .ct-col-right .buy-btn-detail{
                            display: block;
                            text-align: center;
                            max-width: 150px;
                            background: #fac513;
                            font-size: 16px;
                            font-weight: bold;
                            margin-top: 10px;
                            padding: 10px 15px;
                            color: #000;
                            border: none;
                            text-shadow: none;
                        }
                        .ct-news-prod .ct-col-left .ct-buy-now:hover{
                            text-decoration: none;
                        }
                        .ct-news-prod .ct-col-right .ct-more{
                            color: #278cd4;
                            font-size: 15px;
                        }

                        h2 span.ct-big-num {
                            font-size: 72px !important;
                            line-height: 36px;
                            float: left;
                            padding: 10px;
                            color: #dc513a;
                            font-weight: 300;
                            margin-bottom: 10px;
                        }
                        @media(max-width: 767px){
                            .inner-cat .ct-viewmore a, .inner-tag .ct-viewmore a{
                                font-size: 16px;
                            }
                        }
                        @media(max-width: 680px){
                            .inner-cat, .inner-tag{
                                display: block;
                                padding: 0px;
                            }
                            .inner-cat .inner-prod-row, .inner-tag .inner-prod-row{
                                width: 100%;
                                margin: 10px;
                            }
                            .inner-cat .inner-prod-row:nth-child(1), .inner-tag .inner-prod-row:nth-child(1){
                                padding-bottom: 10px;
                            }
                            .inner-cat .ct-viewmore, .inner-tag .ct-viewmore{
                                margin: 5px 0px 10px 0px;
                            }
                        }
                        @media(max-width: 575px){
                            .ct-news-prod.ct-mobile{
                                display: block;
                            }
                            .ct-news-prod.ct-pc{
                                display: none;
                            }
                            .ct-news-prod.ct-mobile .ct-hide-block{
                                display: none;
                                margin-bottom: 10px;
                            }
                            .ct-news-prod.ct-mobile .ct-col-left img{
                                width: 110px;
                                height: 110px;
                            }
                            .ct-news-prod .ct-col-left{
                                width: 110px;
                                float: left;
                            }
                            .ct-news-prod .ct-col-right{
                                width: calc(100% - 110px);
                                float: right;
                                padding-left: 20px;
                            }
                            .ct-news-prod.ct-mobile .ct-col-right .ct-price span{
                                color: #ff4f47;
                                font-size: 20px;
                                font-weight: normal;
                                float: none;
                            }
                            .ct-news-prod.ct-mobile .ct-col-right .ct-price{
                                color: #767875;
                                font-size: 16px;
                                margin-top: 5px;
                            }
                            .ct-news-prod.ct-mobile .ct-col-right .ct-unit{
                                color: #767875;
                                font-size: 15px;
                            }
                            .ct-news-prod.ct-mobile .ct-col-right span.ct-show-more{
                                color: #278cd4;
                                font-size: 13px;
                                cursor: pointer;
                                -webkit-touch-callout: none;
                                -webkit-user-select: none;
                                -khtml-user-select: none;
                                -moz-user-select: none;
                                -ms-user-select: none;
                                user-select: none;
                            }
                            .ct-news-prod.ct-mobile .ct-col-right .ct-title {
                                font-size: 15px;
                                font-weight: bold;
                                line-height: 18px;
                            }
                            .ct-news-prod .ct-col-right p{
                                font-size: 12px;
                            }
                        }
                        @media(max-width: 480px){
                            .inner-prod .inner-prod-row .inner-prod-img img{
                                width: 100px !important;
                                height: 100px !important;
                            }
                            .inner-prod .inner-prod-row .inner-prod-info .inner-prod-price{
                                margin-bottom: 5px;
                                font-size: 15px;
                            }
                            a.inner-view-details{
                                padding: 5px 10px;
                                font-size: 12px !important;
                            }
                        }
                        .ct-old-price span {
                            display: block;
                            color: #ccc;
                            padding-left: 34px;
                            text-decoration: line-through;
                        }
                    </style>
                    <h1 style="color:#FF0000;">Chính sách giao hàng</h1>
                    <p><strong>Phụ tùng xe máy Nguyễn Xuân Toàn</strong>&nbsp;gởi đến Quý khách hàng dịch vụ&nbsp;"
                        <strong>GIAO HÀNG TẬN NƠI</strong>"&nbsp;
                        <br>nhằm phục vụ tốt&nbsp;hơn cho Quý Khách Hàng có nhu cầu mua Phụ tùng - Đồ chơi xe trên toàn quốc.</p>
                    <span style="color:#FF0000;"><strong>1.&nbsp;THỜI GIAN GIAO HÀNG:</strong></span><br> TP.Hồ Chí Minh:&nbsp;
                    <br> -&nbsp;Tuyến quận: Giao hàng trong vòng 24h kể từ lúc nhân viên liên hệ xác nhận đơn hàng.
                    <br> -&nbsp;Tuyến Huyện: Giao hàng trong vòng 48h kể từ lúc nhân viên liên hệ xác nhận đơn hàng.
                    <br> Các tỉnh thành trên Toàn quốc:<br> - Tùy thuộc khu vực thời gian nhận hàng có thể dao động từ 2&nbsp;- 5&nbsp;ngày.
                    <br> - Mọi chi tiết xin liên hệ hotline:&nbsp;<strong>0975-618-061</strong> để được hỗ trợ tốt nhất.<br>
                    <br> <span style="color:#FF0000;"><strong>2. PHÍ GIAO HÀNG:</strong></span>  <div style="text-align: center;">&nbsp;</div>
                    <table border="1" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr>
                            <td><strong>KHU VỰC</strong></td>
                            <td><strong>TRƯỜNG HỢP</strong></td>
                            <td><strong>CƯỚC PHÍ</strong></td>
                        </tr>
                        <tr>
                            <td rowspan="4"><strong>TP. HỒ CHÍ MINH</strong></td>
                            <td>Quận Tân Phú</td><td>20.000</td>
                        </tr>
                        <tr>
                            <td>Quận 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12<br>Bình Thạnh, Gò Vấp, Phú Nhuận, Bình Tân, Tân Bình, Thủ Đức</td>
                            <td>25.000</td>
                        </tr>
                        <tr>
                            <td>Huyện Bình Chánh, Nhà Bè, Hóc Môn, Củ Chi,…</td>
                            <td>35.000 – 50.000</td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="color:#FF0000;"><strong>Đặc biệt, những đơn hàng từ&nbsp;1.000.000 sẽ được FREESHIP.<br>
                                        <em>(Áp dụng trong các quận của Tp.HCM)</em></strong></span><br> 			&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                <br><strong>CÁC TỈNH</strong></td>
                            <td colspan="2">Tùy theo khối lương, khu vực,… Tham khảo tại: &nbsp;<br>
                                <a href="https://giaohangtietkiem.vn/"><span style="color:#0000FF;">giaohangtietkiem.vn</span></a><br>
                                <a href="https://www.viettelpost.com.vn/tinh-cuoc-van-chuyen" target="_blank">Viettelpost.com.vn/tinh-cuoc-van-chuyen</a>
                            </td>
                        </tr>
                        </tbody>
                    </table> &nbsp;
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection

