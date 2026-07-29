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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('title_bn', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('mission', 255)->nullable();
            $table->string('mission_bn', 255)->nullable();
            $table->string('vision', 255)->nullable();
            $table->string('vision_bn', 255)->nullable();
            $table->string('image1', 255)->nullable();
            $table->string('image2', 255)->nullable();
            $table->string('video_url', 255)->nullable();
            
            $table->string('value_1_title', 255)->nullable();
            $table->text('value_1_desc')->nullable();
            $table->string('value_2_title', 255)->nullable();
            $table->text('value_2_desc')->nullable();
            $table->string('value_3_title', 255)->nullable();
            $table->text('value_3_desc')->nullable();
            
            $table->tinyInteger('active_status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
