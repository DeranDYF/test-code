<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_2s extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_belakang',
    ];
}
