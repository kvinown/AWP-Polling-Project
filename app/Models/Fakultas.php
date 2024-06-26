<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama'
    ];

    protected $primaryKey = 'id';
}
