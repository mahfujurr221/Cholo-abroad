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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('title_bn', 100)->nullable();
            $table->string('slug', 120)->unique();
            $table->string('short_description', 255)->nullable();
            $table->string('short_description_bn', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('icon', 100)->nullable();
            $table->string('image', 255)->nullable();
            
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
        Schema::dropIfExists('services');
    }
};
