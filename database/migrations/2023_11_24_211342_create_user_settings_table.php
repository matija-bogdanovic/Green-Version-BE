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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();

            $table->boolean('marketing_personalised_recommendations')->default(false);
            $table->boolean('marketing_latest_insights')->default(false);
            $table->boolean('marketing_marketing')->default(false);

            $table->boolean('general_personalised_recommendations')->default(false);
            $table->boolean('general_latest_insights')->default(false);
            $table->boolean('general_marketing')->default(false);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
