<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['pro_name','cat_id','col_id','size_id','fac_id','images','quantity','price','description','status'];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
}
