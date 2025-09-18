<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = ['nomor_surat', 'judul', 'tanggal', 'kategori_id', 'file_path'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

