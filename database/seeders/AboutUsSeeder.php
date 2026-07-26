<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        AboutUs::create(array (
  'title' => 'About Us',
  'title_bn' => 'আমাদের সম্পর্কে',
  'description' => 'We are the best agency.',
  'description_bn' => 'আমরা সেরা এজেন্সি',
));
    }
}
