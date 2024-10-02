<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('escala_desarrollo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            // Campos para las fases y categorías (gruesa, fina, etc.)
            $table->boolean('motora_gruesa_1_15')->default(false);
            $table->boolean('motora_fina_1_15')->default(false);
            $table->boolean('cognoscitiva_1_15')->default(false);
            $table->boolean('lenguaje_1_15')->default(false);
            $table->boolean('socio_afectiva_1_15')->default(false);
            $table->boolean('habitos_salud_1_15')->default(false);
            // Repetir para cada fase
            $table->boolean('motora_gruesa_15_2')->default(false);
            $table->boolean('motora_fina_15_2')->default(false);
            $table->boolean('cognoscitiva_15_2')->default(false);
            $table->boolean('lenguaje_15_2')->default(false);
            $table->boolean('socio_afectiva_15_2')->default(false);
            $table->boolean('habitos_salud_15_2')->default(false);
            // Repetir para cada fase
            $table->boolean('motora_gruesa_2_25')->default(false);
            $table->boolean('motora_fina_2_25')->default(false);
            $table->boolean('cognoscitiva_2_25')->default(false);
            $table->boolean('lenguaje_2_25')->default(false);
            $table->boolean('socio_afectiva_2_25')->default(false);
            $table->boolean('habitos_salud_2_25')->default(false);
            // Repetir para cada fase
            $table->boolean('motora_gruesa_2_3')->default(false);
            $table->boolean('motora_fina_2_3')->default(false);
            $table->boolean('cognoscitiva_2_3')->default(false);
            $table->boolean('lenguaje_2_3')->default(false);
            $table->boolean('socio_afectiva_2_3')->default(false);
            $table->boolean('habitos_salud_2_3')->default(false);
            // Repetir para cada fase
            $table->boolean('motora_gruesa_3_4')->default(false);
            $table->boolean('motora_fina_3_4')->default(false);
            $table->boolean('cognoscitiva_3_4')->default(false);
            $table->boolean('lenguaje_3_4')->default(false);
            $table->boolean('socio_afectiva_3_4')->default(false);
            $table->boolean('habitos_salud_3_4')->default(false);
            // Repetir para cada fase
            $table->boolean('motora_gruesa_4_5')->default(false);
            $table->boolean('motora_fina_4_5')->default(false);
            $table->boolean('cognoscitiva_4_5')->default(false);
            $table->boolean('lenguaje_4_5')->default(false);
            $table->boolean('socio_afectiva_4_5')->default(false);
            $table->boolean('habitos_salud_4_5')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('escala_desarrollo');
    }
};
