<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'status',
        'nama',
        'started_date',
        'ended_date',
    ];

    protected $primaryKey = 'id';
}
