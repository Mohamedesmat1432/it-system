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
        Schema::create('user_schemas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('floor')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->uuid('rack_id')->nullable();
            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('cascade');
            $table->uuid('patch_id')->nullable();
            $table->foreign('patch_id')->references('id')->on('patches')->onDelete('cascade');
            $table->uuid('subnet_id')->nullable();
            $table->foreign('subnet_id')->references('id')->on('subnets')->onDelete('cascade');
            $table->uuid('ip_id')->nullable();
            $table->foreign('ip_id')->references('id')->on('ips')->onDelete('cascade');
            $table->uuid('telephone_id')->nullable();
            $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
            $table->uuid('switch_id')->nullable();
            $table->foreign('switch_id')->references('id')->on('switch_data')->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_schemas');
    }
};
