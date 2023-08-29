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
        Schema::create('referrers', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->timestamps();
            $table->string('email')->unique();
            $table->boolean('subscribed')->default(true);
            $table->boolean('accepted_contact')->default(false);
            $table->boolean('accepted_terms')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referers');
    }
};
