<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessSeeder extends Seeder
{
    public function run(): void
    {
        $processes = [
            [
                'title' => 'Free Assessment',
                'title_bn' => 'বিনামূল্যে মূল্যায়ন',
                'description' => '15-minute call to evaluate your eligibility and shortlist 2–3 countries that match your profile, budget, and timeline.',
                'description_bn' => 'আপনার যোগ্যতা মূল্যায়ন এবং আপনার প্রোফাইল, বাজেট ও সময়সীমার সাথে মানানসই ২–৩টি দেশ শর্টলিস্ট করতে ১৫ মিনিটের কল।',
                'step_number' => 1,
                'active_status' => 1,
            ],
            [
                'title' => 'Application Build',
                'title_bn' => 'আবেদন তৈরি',
                'description' => 'We prepare your SOP, gather documents, format financials, and submit your university and visa application simultaneously.',
                'description_bn' => 'আমরা আপনার এসওপি তৈরি করি, ডকুমেন্ট সংগ্রহ করি, আর্থিক বিষয় ফরম্যাট করি এবং একসাথে বিশ্ববিদ্যালয় ও ভিসা আবেদন জমা দিই।',
                'step_number' => 2,
                'active_status' => 1,
            ],
            [
                'title' => 'Interview Prep',
                'title_bn' => 'ইন্টারভিউ প্রস্তুতি',
                'description' => 'Mock embassy interviews with real question banks — so you walk in confident, not just rehearsed. We address every weak point.',
                'description_bn' => 'বাস্তব প্রশ্নের ব্যাংক দিয়ে মক দূতাবাস ইন্টারভিউ — যাতে আপনি শুধু মহড়া দেওয়া নয়, আত্মবিশ্বাসের সাথে প্রবেশ করেন।',
                'step_number' => 3,
                'active_status' => 1,
            ],
            [
                'title' => 'Visa & Departure',
                'title_bn' => 'ভিসা ও প্রস্থান',
                'description' => 'Stamp secured. We arrange tickets, pre-departure briefing, airport pickup coordination, and first-week settlement support.',
                'description_bn' => 'স্ট্যাম্প নিশ্চিত। আমরা টিকিট, প্রস্থান-পূর্ব ব্রিফিং, বিমানবন্দর পিকআপ সমন্বয় এবং প্রথম সপ্তাহের সেটেলমেন্ট সহায়তা ব্যবস্থা করি।',
                'step_number' => 4,
                'active_status' => 1,
            ],
        ];

        foreach ($processes as $process) {
            Process::create($process);
        }
    }
}
