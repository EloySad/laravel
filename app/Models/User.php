<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'names', 'lastnames', 'email', 'gender', 'address', 'phone', 'countries_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }
}
