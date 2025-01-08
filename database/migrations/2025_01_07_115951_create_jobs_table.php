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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('country_ar');
            $table->string('country_en');
            $table->string('full_location_ar');
            $table->string('full_location_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('long_description_ar');
            $table->text('long_description_en');
            $table->string('category_en');
            $table->string('category_ar');
            $table->date('create_date');
            $table->date('close_date');
            $table->string('job_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
