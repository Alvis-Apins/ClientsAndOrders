<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function deliveryLine()
    {
        return $this->hasMany(DeliveryLine::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
