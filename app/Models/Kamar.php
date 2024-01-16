<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kamar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kamar';
    protected $fillable = [
        'kos_id',
        'user_id',
        'nama_kamar',
        'fasilitas',
        'kamar_mandi',
        'foto_kamar',
        'harga',
        'night',
        'status',
        'snap_token',
        'result'
    ];

    public function kos(): BelongsTo
    {
        return $this->belongsTo(Kos::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
