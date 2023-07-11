<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[
        'name_product','slug_product','price_product','image_product', 'desc_brand','id_category',
        'id_brand', 'status_brand', 'unit_product', 'stock_product','weigh_product',
    ];
    protected $primaryKey='id_product';
    protected $table='tbl_product';


    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query=$query->where('name_product', 'LIKE', '%' . $key . '%');
        }
        return $query;
    }

    public function product_category(){
        return $this->belongsTo('App\Models\Category','id_category','id_category');
    }

    public function product_brand(){
        return $this->belongsTo('App\Models\Brand','id_brand','id');
    }

    public function details_product(){
        return $this->hasMany('App\Models\Detailsorder');
    }

}
