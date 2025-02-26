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
        Schema::create('switch_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('port');
            $table->uuid('switch_name_id')->nullable();
            $table->timestamps();
            $table->foreign('switch_name_id')->references('id')->on('switch_names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('switch_data');
    }
};
