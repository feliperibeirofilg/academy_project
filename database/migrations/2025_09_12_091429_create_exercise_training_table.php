<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercise_training', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained()->onDelete('cascade');
            
            // Colunas de dados da pivot (tipos corrigidos)
            $table->integer('series');
            $table->integer('repetitions');
            $table->decimal('weight', 5, 2); // Permite pesos de 0.00 até 999.99
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise_training');
    }
};