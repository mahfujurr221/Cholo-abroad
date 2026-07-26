<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create(array (
  'question' => 'How to apply?',
  'question_bn' => 'কিভাবে আবেদন করব?',
  'answer' => 'Contact us.',
  'answer_bn' => 'যোগাযোগ করুন',
));
    }
}
