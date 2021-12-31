<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    // protected $casts = [
    //     'address' => 'array'
    // ];
    
    // public function setAddressAttribute($value)
    // {
    //     $this->attributes['address'] = json_encode($value);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
