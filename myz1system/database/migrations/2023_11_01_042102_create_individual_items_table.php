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
        Schema::create('individual_items', function (Blueprint $table) {
            $table->id();
            $table->string('sub_id');
            $table->string('service')->unique;
            $table->string('regular');
            $table->string('lasallian_partner');
            $table->string('inclusion');
            $table->string('responsibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_items');
    }
};
