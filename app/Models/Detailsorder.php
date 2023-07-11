<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Detailsorder extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[
        'id_order','id_product','name_product','quantity','price',
    ];
    protected $primaryKey='id_detailsorder';
    protected $table='tbl_detailsorder';


    public function details_order(){
        return $this->belongsTo('App\Models\Order','id_order','id_order');
    }
    public function details_product(){
        return $this->belongsTo('App\Models\Product','id_product','id_product');
    }

}
