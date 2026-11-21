<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $media = Media::with('penggunas')
            ->when($request->filled('judul'), function ($query) use ($request) {
                $query->where('judul', 'like', '%' . $request->judul . '%');
            })
            ->get();

        return MediaResource::collection($media);
    }

    public function store(StoreMediaRequest $request)
    {
        $media = Media::create($request->validated());

        return new MediaResource($media);
    }

    public function show(Media $media)
    {
        $media->load('penggunas');

        return new MediaResource($media);
    }

    public function update(UpdateMediaRequest $request, Media $media)
    {
        $media->update($request->validated());

        return new MediaResource($media);
    }

    public function destroy(Media $media)
    {
        $media->delete();

        return response()->json([
            'message' => 'Media berhasil dihapus.'
        ]);
    }
}