<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primary_key = 'id';
    protected $fillable = [
        'title',
        'creator',
        'image',
        'description',
    ];
}
