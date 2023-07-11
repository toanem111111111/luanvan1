<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[

        'email','name','address','phone','note',
    ];
    protected $primaryKey='id_shipping';
    protected $table='tbl_shipping';

    public function order_shipping(){
        return $this->hasMany('App\Models\Order');
    }



}
