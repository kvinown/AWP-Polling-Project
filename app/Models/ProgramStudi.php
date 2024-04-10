<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $fillable = [
        'id',
        'nama',
        'id_fakultas'
    ];

    protected $primaryKey = 'id';

    public  function Fakultas() : BelongsTo
    {
        return $this->belongsTo(Fakultas::class);
    }
}
