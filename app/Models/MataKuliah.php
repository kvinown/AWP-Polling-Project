<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'id',
        'nama',
        'sks',
        'id_kurikulum',
        'id_program_studi'
    ];

    protected $primaryKey = 'id';

    public function Kurikulum() : BelongsTo
    {
        return $this->BelongsTo(Kurikulum::class);
    }

    public function ProgramStudi() : BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }
}
