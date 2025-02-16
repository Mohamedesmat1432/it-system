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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('send_to')->nullable();
            $table->foreign('send_to')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('problem_id')->nullable();
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->uuid('sub_problem_id')->nullable();
            $table->foreign('sub_problem_id')->references('id')->on('sub_problems')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->enum('status', ['open', 'inprogress', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
