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
        Schema::create('referreds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('cellphone')->unique();
            $table->string('first_name');
            $table->string('surname');
            $table->enum('status', [
                'eligibly_email_1_sent',
                'eligibly_email_2_sent',
                'eligibly_email_3_sent',
                'eligibly_form_completed',
                'eligibly_form_matched',
                'not_interested',
                'nurture_cycle_email_1_sent',
                'nurture_cycle_email_2_sent',
                'nurture_cycle_email_3_sent',
                'meeting_booked',
                'ineligible',
                'pension_boot_eligible',
                'loan_eligible',
                'loan_approved',
                'pension_boot_approved',
                'reward_credited' 
            ]);
            $table->foreignId('referrer_id');
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
