<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto increment

            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('assigned_to')->nullable();

            $table->string('title');
            $table->text('description')->nullable();

            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->enum('status', [
                'not_started',
                'in_progress',
                'completed',
                'on_hold'
            ])->default('not_started');

            $table->timestamps();

            // Foreign key
            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
