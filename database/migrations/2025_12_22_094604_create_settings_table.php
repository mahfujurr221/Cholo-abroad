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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_title')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('social_links')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('footer_text')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('newslatter_text')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();
            // google_map
            $table->text('google_map')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('headline')->nullable();
            $table->longText('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->longText('terms_and_conditions')->nullable();
            $table->longText('privacy_policy')->nullable();

            // Section Titles
            $table->string('countries_title')->nullable();
            $table->text('countries_subtitle')->nullable();
            $table->string('services_title')->nullable();
            $table->text('services_subtitle')->nullable();
            $table->string('process_title')->nullable();
            $table->text('process_subtitle')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_subtitle')->nullable();
            $table->string('testimonials_title')->nullable();
            $table->text('testimonials_subtitle')->nullable();
            $table->string('faq_title')->nullable();
            $table->text('faq_subtitle')->nullable();
            $table->string('contact_title')->nullable();
            $table->text('contact_subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
