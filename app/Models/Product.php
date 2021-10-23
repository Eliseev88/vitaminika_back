<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'brand_id',
        'name',
        'code',
        'description',
        'details',
        'function',
        'form',
        'amount',
        'image',
        'availability',
        'created_at',
        'updated_at',
        'price',

    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getBrand()
    {
        return Brand::find($this->brand_id);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('count');
    }
}
