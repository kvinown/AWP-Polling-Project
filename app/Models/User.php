<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'id_user',
        'nama_user',
        'email',
        'password',
        'id_role'
    ];

    protected $primaryKey = 'id_user';

    public function Role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
