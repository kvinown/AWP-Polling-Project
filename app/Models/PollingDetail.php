<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollingDetail extends Model
{
    use HasFactory;

    protected $table = 'polling_detail';

    protected $fillable = [
        'id',
        'id_user',
        'id_mata_kuliah',
        'id_polling'
    ];

    protected $primaryKey = 'id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'id_mata_kuliah');
    }

    public function polling(): BelongsTo
    {
        return $this->belongsTo(Polling::class, 'id_polling');
    }
}
