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
        'id_polling_detail',
        'id_user',
        'id_mata_kuliah',
        'id_polling'
    ];

    protected $primaryKey = 'id_polling_detail';

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function MataKuliah() : BelongsTo
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public  function Polling() : BelongsTo
    {
        return $this->belongsTo(Polling::class);
    }
}
