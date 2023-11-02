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
        Schema::table('email_jobs', function (Blueprint $table) {
            $table->unsignedInteger('sent_email_id')->nullable();
        });
    }

    /**s
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_jobs', function (Blueprint $table) {
            $table->dropColumn('sent_email_id');
        });
    }
};
