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
        Schema::create('ctas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('title_bn', 150)->nullable();
            $table->text('subtitle')->nullable();
            $table->text('subtitle_bn')->nullable();
            $table->string('button_text', 30)->nullable();
            $table->string('button_text_bn', 30)->nullable();
            $table->string('button_link', 255)->nullable();
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
        Schema::dropIfExists('ctas');
    }
};
