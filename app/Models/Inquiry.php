<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'name',
        'email',
        'phone',
        'street',
        'location',
        'apartment_type',
        'message',
    ];
}
