<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = [
        'id_kurikulum',
        'tahun',
        'semester'
    ];

    protected $primaryKey = 'id_kurikulum';
}
