<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'judul',
        'jenis',
        'genre',
    ];

    public function penggunas(): BelongsToMany
    {
        return $this->belongsToMany(Pengguna::class, 'media_pengguna')
                    ->withTimestamps();
    }
}