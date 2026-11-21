<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pengguna extends Model
{
    protected $table = 'penggunas';

    protected $fillable = [
        'nama',
        'email',
    ];

    public function medias(): BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'media_pengguna')
                    ->withTimestamps();
    }
}