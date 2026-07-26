<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create(array (
  'title' => 'Study Abroad',
  'title_bn' => 'বিদেশে পড়ালেখা',
  'subtitle' => 'Achieve your dreams',
  'subtitle_bn' => 'আপনার স্বপ্ন পূরণ করুন',
  'button_text' => 'Apply Now',
  'button_text_bn' => 'আবেদন করুন',
  'button_link' => '#',
));
    }
}
