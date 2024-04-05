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
        Schema::create('kin', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('id_card');
            $table->string('name');
            $table->string('surname');
            $table->bigInteger('contact_number_1');
            $table->bigInteger('contact_number_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kin');
    }
};
