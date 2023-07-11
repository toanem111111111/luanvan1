<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    use HasFactory;

    public  $timestamps=false;
    protected $fillable=[
        'name_category', 'desc_category', 'status_category',
    ];
    protected $primaryKey='id_category';
    protected $table='tbl_category';


    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query=$query->where('name_category', 'LIKE', '%' . $key . '%');
        }
        return $query;
    }

    public function product_category(){
        return $this->hasMany('App\Models\Product');
    }

}

