<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('comments');
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('writer_id');
            $table->foreign('writer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
