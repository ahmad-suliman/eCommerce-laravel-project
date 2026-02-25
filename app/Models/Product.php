<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function Cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function imageProduct(){
        return $this->hasMany(imageProduct::class);
    }
}
