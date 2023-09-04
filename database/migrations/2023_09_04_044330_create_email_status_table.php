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
        Schema::create('email_status', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('referred_uuid')->unique();
            $table->string('current_status');
            $table->timestamp('last_email_at', 0)->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_status');
    }
};
