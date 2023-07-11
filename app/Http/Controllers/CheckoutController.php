<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
use Mail;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Detailsorder;
session_start();

class CheckoutController extends Controller
{

    public function login_checkout(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Checkout.login_checkout')->with(compact('category','brand'));
    }

    public function add_customer(Request $request){
        $data=$request->validate([
            'name_customer'=>'required|max:255',
            'email_customer'=>'required|max:255',
            'password_customer'=>'required|max:255',
            'phone_customer'=>'required',
        ],
            [
                'name_customer.required' => 'Vui lòng nhập tên để đăng ký.',
                'email_customer.required' => 'Vui lòng nhập email để đăng ký.',
                'phone_customer.required' => 'Vui lòng nhập SDT để đăng ký.',
                'password_customer.required' => 'Vui lòng nhập mật khẩu để đăng ký.',
            ]
        );



//        $data = array();
        $data['name_customer'] = $request->name_customer;
        $data['phone_customer'] = $request->phone_customer;
        $data['email_customer'] = $request->email_customer;
        $data['password_customer'] = md5($request->password_customer);

        $id_customer = DB::table('tbl_customer')->insertGetId($data);
        Session::put('id_customer',$id_customer);
        Session::put('name_customer',$request->name_customer);
        return Redirect::to('/checkout');
//        return view('pages.Checkout.showcheckout')->with(compact('category','brand'));

    }

    public function checkout(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Checkout.showcheckout')->with(compact('category','brand'));
    }


    public function login_customer(Request $request){

        $email_customer = $request->email_customer;
        $password_customer = md5($request->password_customer);
        $result = DB::table('tbl_customer')->where(compact('email_customer'))
            ->where(compact('password_customer'))->first();

        if($result){
            Session::put('id_customer',$result->id_customer);
            return Redirect::to('/checkout');
        }else{

            return Redirect::to('/login-checkout')->with('message','Thông tin đăng nhập sai.');
        }

    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function add_shipping(Request $request){
        $data=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required',
            'address'=>'required',
            'note'=>'required',
        ],
            [
                'name.required' => 'Vui lòng nhập tên.',
                'email.required' => 'Vui lòng nhập email để chúng tôi liên lạc.',
                'phone.required' => 'Vui lòng nhập SDT để chúng tôi liên lạc.',
                'address.required' => 'Vui lòng nhập địa chỉ chính xác để nhận hàng.',
                'note.required' => 'Bạn có thể mô tả gì đó.',
            ]
        );


//        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['note'] = $request->note;
        $data['address'] = $request->address;

        $id_shipping = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('id_shipping',$id_shipping);

        return Redirect::to('/payment');

    }

    public function payment(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Payment.payment')->with(compact('category','brand'));

    }

    public function order_payment(Request $request){
        //insert payment_method
//        $content = Cart::content();
//        echo $content;

        $data = array();
        $data['name_payment'] = 'Tiền mặt';
        $data['status_payment'] = 'Đang chờ xử lý...';
        $id_payment = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['id_customer'] = Session::get('id_customer');
        $order_data['id_shipping'] = Session::get('id_shipping');
        $order_data['id_payment'] = $id_payment;
        $order_data['total_order'] = Cart::total();
        $order_data['status_order'] = 'Đang chờ xử lý...';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $pro_content){
            $order_d_data['id_order'] = $order_id;
            $order_d_data['id_product'] = $pro_content->id;
            $order_d_data['name_product'] = $pro_content->name;
            $order_d_data['quantity'] = $pro_content->qty;
            $order_d_data['price'] = $pro_content->price;
            DB::table('tbl_detailsorder')->insert($order_d_data);
        }
            $customer=Customer::find(Session::get('id_customer'));
            $datam['email'][]=$customer->email_customer;
            Mail::send('pages.Email.email', $data, function($message) use ($datam,$customer){
                $message->to($datam['email'],$customer)->subject('Email order');
                $message->from('DH51801108@student.stu.edu.vn');
            });

            Cart::destroy();
            $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
            $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
            return view('pages.Notify.Notify')->with(compact('category','brand'));

    }


    public function manage_order(Request $request){

        $all_order=DB::table('tbl_order')
            ->join('tbl_customer','tbl_customer.id_customer','=','tbl_order.id_customer')
            ->orderby('tbl_order.id_order','DESC')->paginate(5);
        return view('admin.order_management')->with(compact('all_order'));

    }

    public function view_order($id_order){
//        $this->AuthLogin();
        $order_details = Detailsorder::where('id_order',$id_order)->get();
        $order = Order::where('id_order',$id_order)->get();
        foreach($order as $key => $ord){
            $id_customer = $ord->id_customer;
            $id_shipping = $ord->id_shipping;
            $status_order = $ord->status_order;
            $id_payment=$ord->id_payment;
        }
        $customer = Customer::where('id_customer',$id_customer)->first();
        $shipping = Shipping::where('id_shipping',$id_shipping)->first();
        $payment=Payment::where('id_payment',$id_payment)->first();

        $order_details_product = Detailsorder::with('details_product')->where('id_order', $id_order)->get();

        return view('admin.view_order')->with(compact('order_details','customer','payment','shipping','order','status_order'));
    }



    public function p_payment(Request $request){
        $data = array();
        $data['name_payment'] = 'VNPAY';
        $data['status_payment'] = 'Đang chờ xử lý...';
        $id_payment = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['id_customer'] = Session::get('id_customer');
        $order_data['id_shipping'] = Session::get('id_shipping');
        $order_data['id_payment'] = $id_payment;
        $order_data['total_order'] = Cart::total();
        $order_data['status_order'] = 'Đang chờ xử lý...';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $pro_content){
            $order_d_data['id_order'] = $order_id;
            $order_d_data['id_product'] = $pro_content->id;
            $order_d_data['name_product'] = $pro_content->name;
            $order_d_data['quantity'] = $pro_content->qty;
            $order_d_data['price'] = $pro_content->price;
            DB::table('tbl_detailsorder')->insert($order_d_data);
        }
        $customer=Customer::find(Session::get('id_customer'));
        $datam['email'][]=$customer->email_customer;
        Mail::send('pages.Email.email', $data, function($message) use ($datam,$customer){
            $message->to($datam['email'],$customer)->subject('Email order');
            $message->from('DH51801108@student.stu.edu.vn');
        });


        $data=$request->all();
        $code_vnpay=rand(00,9999);

        ///////////////////////////////////////////////////
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://lvtnshop.com/notify";
        $vnp_TmnCode = "XGOL0929";//Mã website tại VNPAY
        $vnp_HashSecret = "PBNGRUAEWYHSVLZLUMWFOMRXEZVFAJUV"; //Chuỗi bí mật

        $vnp_TxnRef = $code_vnpay; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'TT';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }


//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {

            header('Location: ' . $vnp_Url);

            die();

        } else {
            echo json_encode($returnData);
        }
    }
    public function notify(){


        Cart::destroy();
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Notify.Notify')->with(compact('category','brand'));
    }

    public function express_delivery(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Notify.Express_delivery')->with(compact('category','brand'));
    }


}
