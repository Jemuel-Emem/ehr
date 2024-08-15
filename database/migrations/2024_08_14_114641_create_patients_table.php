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
            $table->string('patientid')->unique();
            $table->string('name');
            $table->date('dateofbirth');
            $table->string('contactinformation');
            $table->text('medicalhistory')->nullable();
            $table->text('currentmedications')->nullable();
            $table->text('allergies')->nullable();
            $table->text('status')->default('Admitted for Confinement');;
            $table->timestamps();
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
