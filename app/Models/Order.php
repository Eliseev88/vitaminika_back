<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'status',
        'name',
        'surname',
        'phone',
        'email',
        'address',
        'delivery_type',
        'created_at',
        'updated_at',
        'delivery',
        'sum',
        'comment',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function delivery_type()
    {
        return $this->belongsTo(Delivery::class, 'delivery_type');
    }
}
