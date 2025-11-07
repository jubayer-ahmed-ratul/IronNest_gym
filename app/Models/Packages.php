<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel convention 'packages')
    protected $table = 'packages';

    // Fields that are mass assignable
    protected $fillable = [
        'name',
        'price',
        'duration',
        'description',
    ];
}
