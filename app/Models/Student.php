<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //creado en terminal con make:model
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'course',
        'email',
        'phone',
    ];
}
