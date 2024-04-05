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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('id_card');
            $table->integer('gender');
            $table->string('name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->text('address');
            $table->integer('postcode');
            $table->bigInteger('contact_number_1');
            $table->bigInteger('contact_number_2');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
