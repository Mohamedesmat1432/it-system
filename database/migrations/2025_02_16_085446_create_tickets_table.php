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
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('problem_id')->nullable();
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->uuid('sub_problem_id')->nullable();
            $table->foreign('sub_problem_id')->references('id')->on('sub_problems')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->enum('ticket_status', ['open', 'inprogress', 'closed'])->default('open');
            $table->uuid('related_ticket')->nullable();
            $table->unsignedBigInteger('forward_to')->nullable();
            $table->foreign('forward_to')->references('id')->on('users')->onDelete('cascade');
            $table->text('notes')->nullable();
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
