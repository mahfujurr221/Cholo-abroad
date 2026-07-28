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
            $table->date('dob');
            $table->string('phone', 30);
            $table->string('email', 100);
            $table->string('city', 100);
            
            $table->string('preferred_country', 50);
            $table->string('visa_type', 50);
            $table->string('highest_education', 50);
            $table->string('target_intake', 50);
            
            $table->text('notes')->nullable();
            
            $table->enum('status', ['Pending', 'Reviewed', 'In Progress', 'Completed', 'Rejected'])->default('Pending');
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
