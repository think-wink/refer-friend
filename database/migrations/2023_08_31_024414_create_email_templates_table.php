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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->unique();
            $table->string('subject')->nullable();
            $table->string('greeting_text')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('cover_image_url')->nullable();
            $table->text('cover_image_text')->nullable();
            $table->text('upper_text')->nullable();
            $table->text('button_text')->nullable();
            $table->text('button_url')->nullable();
            $table->text('lower_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};
