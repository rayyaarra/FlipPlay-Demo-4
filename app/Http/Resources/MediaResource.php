<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'jenis' => $this->jenis,
            'genre' => $this->genre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'penggunas' => $this->whenLoaded('penggunas'),
        ];
    }
}