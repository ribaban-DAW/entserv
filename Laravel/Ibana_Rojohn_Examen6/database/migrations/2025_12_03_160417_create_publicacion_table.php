<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Categoria;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 200);
            $table->text('texto');
            $table->date('fechaCreacion');
            $table->boolean('publicado');
            $table->date('fechaPublicacion')->nullable();
            $table->foreignIdFor(Categoria::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion');
    }
};
