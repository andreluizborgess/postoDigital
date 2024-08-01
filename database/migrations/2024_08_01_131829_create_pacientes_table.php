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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->date('data_nascimento')->nullable(false);
            $table->string('endereco')->nullable(false);
            $table->string('email')->nullable(false); 
            $table->decimal('cpf', 8, 2)->nullable->unique(false); 
            $table->decimal('celular', 5, 2)->nullable(false); 
            $table->string('senha')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
