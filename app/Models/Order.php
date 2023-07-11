<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer;
class Order extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[

        'id_customer','id_shipping','id_payment','total_order','status_order',
    ];
    protected $primaryKey='id_order';
    protected $table='tbl_order';


    public function order_payment(){
        return $this->belongsTo('App\Models\Payment','id_payment','id_payment');
    }

    public function order_shipping(){
        return $this->belongsTo('App\Models\Shipping','id_shipping','id_shipping');
    }
    public function order_customer(){
        return $this->belongsTo('App\Models\Customer','id_customer','id_customer');
    }

//    public function order_customer()
//    {
//        return $this->belongsTo(Customer::class,'id_customer');
//    }


    public function details_order(){
        return $this->hasMany('App\Models\Detailsorder');
    }
    public function scopeSearch($query, $request)
    {
        if($request->key === null) return $query;
        return $query->where('name_customer', 'LIKE', '%' . $request->key . '%')
            ->orWhere('phone', 'LIKE', '%' . $request->key . '%');
    }

}
