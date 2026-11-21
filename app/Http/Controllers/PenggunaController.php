<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Media;

class PenggunaController extends Controller
{
    public function koleksi(Pengguna $pengguna)
    {
        return response()->json([
            'pengguna' => $pengguna->nama,
            'koleksi' => $pengguna->medias,
        ]);
    }

    public function tambahKoleksi(Pengguna $pengguna, Media $media)
    {
        if ($pengguna->medias()->where('media.id', $media->id)->exists()) {
            return response()->json([
                'message' => 'Media sudah ada dalam koleksi pengguna.'
            ], 409);
        }

        $pengguna->medias()->attach($media->id);

        return response()->json([
            'message' => 'Media berhasil ditambahkan ke koleksi.'
        ]);
    }

    public function hapusKoleksi(Pengguna $pengguna, Media $media)
    {
        $pengguna->medias()->detach($media->id);

        return response()->json([
            'message' => 'Media berhasil dihapus dari koleksi.'
        ]);
    }
}