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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->string('msd_lanza')->nullable();
            $table->string('msd_alcanza')->nullable();
            $table->string('msd_coge')->nullable();
            $table->string('msd_suelta')->nullable();
            $table->string('msd_empuja')->nullable();
            $table->string('msd_hala')->nullable();
            $table->string('msi_lanza')->nullable();
            $table->string('msi_alcanza')->nullable();
            $table->string('msi_coge')->nullable();
            $table->string('msi_suelta')->nullable();
            $table->string('msi_empuja')->nullable();
            $table->string('msi_hala')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
};
