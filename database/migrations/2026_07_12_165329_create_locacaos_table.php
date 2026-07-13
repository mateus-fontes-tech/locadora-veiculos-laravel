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
        Schema::create('locacaos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->cascadeOnDelete();

            $table->foreignId('veiculo_id')
                ->constrained('veiculos')
                ->cascadeOnDelete();

            $table->date('data_retirada');
            $table->date('data_devolucao');
            $table->integer('dias');
            $table->decimal('valor_total', 10, 2);

            $table->enum('status', [
                'Ativa',
                'Finalizada'
            ])->default('Ativa');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacaos');
    }
};