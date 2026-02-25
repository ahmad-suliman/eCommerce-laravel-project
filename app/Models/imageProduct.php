<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class imageProduct extends Model
{
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
