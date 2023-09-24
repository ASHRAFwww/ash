<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Workbench\App\Models\User;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
        'password',
        'date',
        'img',
        'salary',

    ];
    // public function user(){
    //     return $this->hasOne(User::class);
    // }
    // public function pills(){
    //     return $this->hasMany(Pill::class);
    // }
    // public function cities(){
    //     return $this->hasMany(City::class);
    // }


}
