<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Payment extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[
        'name_payment','status_payment',
    ];
    protected $primaryKey='id_payment';
    protected $table='tbl_payment';

    public function order_payment(){
        return $this->hasMany('App\Models\Order');
    }

}
