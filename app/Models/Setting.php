<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'keyword',
        'description',
        'logo',
        'icon',
        'domain',
        'author',
        'phone',
        'email',
        'address',
        'maintenance_mode',
    ];
}
