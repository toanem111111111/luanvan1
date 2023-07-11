<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[
        'name_customer','email_customer','password_customer','phone_customer',
    ];
    protected $primaryKey='id_customer';
    protected $table='tbl_customer';

    public function order_customer(){
        return $this->hasMany('App\Models\Order');
    }
//    public function order_customer()
//    {
//        return $this->hasMany(Order::class);
//    }

    public function google_customer()
    {
        return $this->hasMany('App\Models\SocialCustomer','id_customer');
    }


    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query=$query->where('name_customer', 'LIKE', '%' . $key . '%');
        }
        return $query;
    }

}
