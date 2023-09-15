<?php

use App\Models\TipoVisita;
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
        Schema::create('tipo_visitas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->string('duracao');
            $table->boolean('status')->default(true);
            $table->string('aprovado')->default(TipoVisita::TIPO_ENUM['aprovado']);
            $table->boolean("funciona_domingo")->default(false);
            $table->boolean("funciona_segunda")->default(false);
            $table->boolean("funciona_terca")->default(false);
            $table->boolean("funciona_quarta")->default(false);
            $table->boolean("funciona_quinta")->default(false);
            $table->boolean("funciona_sexta")->default(false);
            $table->boolean("funciona_sabado")->default(false);
            $table->time('manha_inicio')->nullable(true);
            $table->time('manha_fim')->nullable(true);
            $table->time('tarde_inicio')->nullable(true);
            $table->time('tarde_fim')->nullable(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_visitas');
    }
};
