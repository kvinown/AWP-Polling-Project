<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected  $table = 'role';
    public $incrementing = false;

    protected  $fillable = [
        'id',
        'nama'
    ];

    protected $primaryKey = 'id';
}
