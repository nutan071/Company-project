<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id','total_price','status',


    ] ;

    public function product()

    {
        return $this->belongsTo(Product::class)->withPivot('quantity','price');
    }
}
