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
        Schema::create('lead_logs', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('description');
            $table->unsignedBigInteger('lead_id');            
            $table->unsignedBigInteger('user_id')->nullable();            
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('lead_id')->references('id')->on('leads')
            ->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_logs');
    }
};
