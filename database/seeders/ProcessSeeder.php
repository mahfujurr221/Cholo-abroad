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
                'title' => 'One-on-One Counselling',
                'title_bn' => 'ওয়ান-অন-ওয়ান কাউন্সেলিং',
                'description' => 'We evaluate your profile and ambitions to pinpoint the ideal programs.',
                'description_bn' => 'আদর্শ প্রোগ্রাম চিহ্নিত করতে আমরা আপনার প্রোফাইল এবং উচ্চাকাঙ্ক্ষা মূল্যায়ন করি।',
                'step_number' => 1,
                'icon' => 'bx bx-conversation',
                'color' => '#F2A81D',
                'active_status' => 1,
            ],
            [
                'title' => 'Document Assembly',
                'title_bn' => 'ডকুমেন্ট সংগ্রহ',
                'description' => 'Guidance on transcripts, recommendation letters, and all required paperwork.',
                'description_bn' => 'ট্রান্সক্রিপ্ট, সুপারিশপত্র এবং সমস্ত প্রয়োজনীয় কাগজপত্রের বিষয়ে গাইডেন্স।',
                'step_number' => 2,
                'icon' => 'bx bx-file',
                'color' => '#00B4DB',
                'active_status' => 1,
            ],
            [
                'title' => 'Application Guidance',
                'title_bn' => 'আবেদনে গাইডেন্স',
                'description' => 'Our experts will guide you through the application process and help you meet the deadlines.',
                'description_bn' => 'আমাদের বিশেষজ্ঞরা আপনাকে আবেদন প্রক্রিয়ার মাধ্যমে গাইড করবেন এবং সময়সীমা পূরণে সহায়তা করবেন।',
                'step_number' => 3,
                'icon' => 'bx bxs-graduation',
                'color' => '#F05053',
                'active_status' => 1,
            ],
            [
                'title' => 'Interview Coaching',
                'title_bn' => 'ইন্টারভিউ কোচিং',
                'description' => 'Mock interviews and personalised tips to help you shine.',
                'description_bn' => 'মক ইন্টারভিউ এবং ব্যক্তিগতকৃত টিপস যা আপনাকে উজ্জ্বল হতে সাহায্য করবে।',
                'step_number' => 4,
                'icon' => 'bx bx-microphone',
                'color' => '#654ea3',
                'active_status' => 1,
            ],
            [
                'title' => 'Acceptance & Visa Aid',
                'title_bn' => 'গ্রহণযোগ্যতা ও ভিসা সহায়তা',
                'description' => 'From offer letters to visa paperwork and pre-departure briefings.',
                'description_bn' => 'অফার লেটার থেকে শুরু করে ভিসা পেপারওয়ার্ক এবং প্রস্থান-পূর্ব ব্রিফিং।',
                'step_number' => 5,
                'icon' => 'bx bx-check-shield',
                'color' => '#8cc63f',
                'active_status' => 1,
            ],
        ];

        foreach ($processes as $process) {
            Process::create($process);
        }
    }
}
