<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer\Referred;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('referreds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('reward_status', array_merge(Referred::INTERNAL_STATUS, Referred::EXTERNAL_STATUS));
            $table->enum('match_status', Referred::MATCH_STATUS);
            $table->foreignId('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('referrers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referreds');
    }
};
