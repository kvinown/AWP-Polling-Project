<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akun';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'password',
        'id_role'
    ];

    protected $primaryKey = 'id';

    public function Role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
