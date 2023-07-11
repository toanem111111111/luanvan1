<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\SocialCustomer;
use DB;
use Session;

class LoginGoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();//mang xa hoi
    }

    public function handleGoogleCallback()
    {
        $users = Socialite::driver('google')->stateless()->user();
        // // return $users->id;
        // return $users->name;
        // return $users->email;
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account_name =DB::table('tbl_customer')->where('id_customer',$authUser->user)->first();
//            $account_name = Customer::where('id_customer',$authUser->user)->first();
//            Session::forget('id_customer',$account_name->id_customer);
            Session::put('id_customer',$account_name->id_customer);
            Session::put('name_customer',$account_name->name_customer);
        }elseif ($customer_new){
            $account_name =DB::table('tbl_customer')->where('id_customer',$authUser->user)->first();
            Session::put('id_customer',$account_name->id_customer);
            Session::put('name_customer',$account_name->name_customer);
        }
        return redirect('/')->with('message', 'Đăng nhập bằng tài khoản Google <span style="color: red">'.$account_name->email_customer.'</span>
 thành công');
    }

    public function findOrCreateUser($users, $provider){
        $authUser = SocialCustomer::where('provider_user_id', $users->id)->where('provider_user_email',$users->email)->first();
        if($authUser){

            return $authUser;
        }else{
            $customer_new=new SocialCustomer([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);

        }

        $customer = Customer::where('email_customer',$users->email)->first();

        if(!$customer){
            $customer=Customer::create([
               'name_customer'=>$users->name,
               'email_customer'=>$users->email,
                'password_customer' => '',
                'phone_customer' => ''
            ]);
        }


        $customer_new->login()->associate($customer);
        $customer_new->save();
        return $customer_new;
    }


}
