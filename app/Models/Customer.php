<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone'];

    public function address()
    {
        return $this->hasOne(CustomerAddress::class);
    }

    public function purchases()
    {
        return $this->hasMany(CustomerPurchase::class);
    }


}
