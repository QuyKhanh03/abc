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
        Schema::create('vocher', function (Blueprint $table) {
            $table->id();
            $table->string('voc_name',200);
            $table->integer('total_number');
            $table->timestamp('date-create');
            $table->timestamp('date-exp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocher');
    }
};
