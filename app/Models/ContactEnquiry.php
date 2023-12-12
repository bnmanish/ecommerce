<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'city',
        'message',
    ];
}
