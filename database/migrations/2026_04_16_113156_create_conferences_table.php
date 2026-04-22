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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('starts_at');
            $table->date('ends_at');
            $table->date('cfp_starts_at');
            $table->date('cfp_ends_at');
            $table->string('location')->nullable();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->string('callingallpapers_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
