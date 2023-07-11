<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;

    public  $timestamps=false;
    protected $fillable=[
        'name_brand', 'desc_brand', 'status_brand',
    ];
    protected $primaryKey='id';
    protected $table='tbl_brand';


    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query=$query->where('name_brand', 'LIKE', '%' . $key . '%');
        }
        return $query;
    }

    public function product_brand(){
        return $this->hasMany('App\Models\Product');
    }
}
