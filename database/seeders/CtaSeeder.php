<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cta;

class CtaSeeder extends Seeder
{
    public function run(): void
    {
        Cta::create([
            'title' => 'Ready to lock in your country?',
            'title_bn' => 'আপনার দেশ নির্ধারণ করতে প্রস্তুত?',
            'subtitle' => 'Book a free 15-minute assessment — no obligation, just a clear next step. A counsellor reviews your profile and calls you within one business day.',
            'subtitle_bn' => 'বিনামূল্যে ১৫ মিনিটের মূল্যায়ন বুক করুন — কোনো বাধ্যবাধকতা নেই, শুধু একটি স্পষ্ট পরবর্তী পদক্ষেপ। একজন কাউন্সেলর আপনার প্রোফাইল পর্যালোচনা করেন এবং এক কার্যদিবসের মধ্যে আপনাকে কল করেন।',
            'button_text' => 'Apply Now',
            'button_text_bn' => 'আবেদন করুন',
            'button_link' => '/apply',
            'active_status' => 1,
        ]);
    }
}
