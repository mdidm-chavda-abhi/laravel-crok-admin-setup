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
        Schema::create('category_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('step_name');

            // Step Type: simple, received_pending, copy_option
            $table->enum('step_type', ['simple', 'received_pending', 'copy_option'])->default('simple');

            // For step progress
            $table->enum('status', ['not_started', 'in_progress', 'completed', 'received', 'pending'])->default('not_started');

            // Track dates for pending calculation
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('pending_since')->nullable(); // When it went into pending state

            // For copy option type (customer choice)
            $table->boolean('copy_requested')->nullable(); // null = not asked, true = yes, false = no

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_steps');
    }
};
