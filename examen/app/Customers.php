<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    //Scopes
    public function scopeIsActive($query)
    {
        return $query->where('customers.is_active', true);
    }
}
