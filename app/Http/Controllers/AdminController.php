<?php

namespace App\Http\Controllers;

use App\Login;
use App\Models\Customer;
use App\Social;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Socialite;
use App\Models\SocialCustomer;
session_start();


class AdminController extends Controller
{
    public function index(){
        return view('login_admin');
    }




}
