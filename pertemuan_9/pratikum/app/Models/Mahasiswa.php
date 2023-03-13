<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    use HasFactory;
    // protected $table = 'mahasiswas';

    protected $primaryKey = 'Nim';
    public $timestamps = false;
    protected $fillable = [
        'Nim',
        'Nama',
        'kelas_id',
        'Jurusan',
        'No_Handphone',
        'Email',
        'Tgl_lahir'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
