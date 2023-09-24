<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function pills(){
        return $this->hasMany(Pill::class);

    }

    public function meals(){
        return $this->hasMany(Meal::class);

    }


}
