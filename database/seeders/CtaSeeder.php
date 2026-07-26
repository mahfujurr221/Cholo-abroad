<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cta;

class CtaSeeder extends Seeder
{
    public function run(): void
    {
        Cta::create(array (
  'title' => 'Ready to go?',
  'title_bn' => 'প্রস্তুত?',
  'subtitle' => 'Contact us now',
  'subtitle_bn' => 'যোগাযোগ করুন',
  'button_text' => 'Contact Us',
  'button_text_bn' => 'যোগাযোগ করুন',
  'button_link' => '#',
));
    }
}
