<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable  = [
        'kamar_id',
        'nominal'
    ];

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }
}
