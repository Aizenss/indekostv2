<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kos extends Model
{
    use HasFactory;
    protected $table = 'kosts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'owner_id',
        'nama_kost',
        'ketentuan',
        'lokasi',
        'spesifikasi',
        'peraturan',
        'fasilitas_umum',
        'fasilitas_kamar_mandi',
        'fasilitas_tempat_parkir',
        'status',
        'foto_depan',
        'foto_dalam',
        'foto_tambahan'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'kost_id');
    }
    public function kamar(): HasMany
    {
        return $this->hasMany(Kamar::class, 'kos_id');
    }
}
