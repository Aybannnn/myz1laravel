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
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->id();
            $table->string('requesting_office');
            $table->string('contact_person');
            $table->string('contact_person_no');
            $table->string('contact_person_email');
            $table->string('production_title');
            $table->string('running_time');
            $table->string('rental_name1');
            $table->string('rental_name1_hours');
            $table->string('rental_name2');
            $table->string('rental_name2_hours');
            $table->string('rental_name3');
            $table->string('rental_name3_hours');
            $table->string('rental_name4');
            $table->string('rental_name4_hours');
            $table->string('rental_name5');
            $table->string('rental_name5_hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_requests');
    }
};
