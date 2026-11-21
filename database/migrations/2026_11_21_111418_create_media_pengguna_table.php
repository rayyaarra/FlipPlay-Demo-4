<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_pengguna', function (Blueprint $table) {
            $table->id();

            $table->foreignId('media_id')
                ->constrained('media')
                ->cascadeOnDelete();

            $table->foreignId('pengguna_id')
                ->constrained('penggunas')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['media_id', 'pengguna_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_pengguna');
    }
};
