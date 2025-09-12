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
        Schema::create('exercise_training', function (Blueprint $table) {
            $table->id();
            $table->foreingId('training_id');
            $table->fireingId('exercicio_id');
            $table->string('series');
            $table->string('repetitions');
            $table->decimal('weight', 2,1);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_training');
    }
};
