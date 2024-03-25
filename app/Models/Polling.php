<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';

    protected $fillable = [
        'id_polling',
        'status'
    ];

    protected $primaryKey = 'id_polling';
}
