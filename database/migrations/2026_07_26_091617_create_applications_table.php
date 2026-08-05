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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 30);
            $table->string('email', 100);
            $table->string('preferred_country', 50);
            $table->string('highest_education', 50);
            $table->string('english_proficiency', 100)->nullable();
            
            $table->text('notes')->nullable();
            
            $table->boolean('is_read')->default(false);
            
            $table->enum('status', ['pending', 'reviewed', 'contacted', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
