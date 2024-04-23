<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'tahun',
    ];

    protected $primaryKey = 'id';
}
