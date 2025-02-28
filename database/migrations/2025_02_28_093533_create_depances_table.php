<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('depances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->decimal('montant', 10, 2);
            $table->foreignId('id_categorie')->references('id')->on('categories')->onDelete('cascade');
            $table->enum('type_depense', ['quotidienne', 'recurrente']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depances');
    }
};
