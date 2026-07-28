<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Tasnim Rahman',
                'name_bn' => 'তাসনিম রহমান',
                'designation' => 'Engineering student, Toronto, Canada',
                'designation_bn' => 'ইঞ্জিনিয়ারিং শিক্ষার্থী, কানাডা',
                'quote' => 'Cholo Abroad filed my Canada study permit in under six weeks. My counsellor caught a document gap the university itself had missed. I honestly don\'t think I\'d have gotten through without them.',
                'quote_bn' => 'চলো অ্যাব্রড ছয় সপ্তাহেরও কম সময়ে আমার কানাডা স্টাডি পারমিট জমা দিয়েছে। আমার কাউন্সেলর একটি ডকুমেন্টের ঘাটতি ধরেছিলেন যা বিশ্ববিদ্যালয় নিজেও মিস করেছিল।',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Mahmudul Hasan',
                'name_bn' => 'মাহমুদুল হাসান',
                'designation' => 'MSc Computer Science, Manchester, UK',
                'designation_bn' => 'এমএসসি কম্পিউটার বিজ্ঞান, যুক্তরাজ্য',
                'quote' => 'I was rejected once before coming to Cholo Abroad. They rebuilt my entire file — new SOP, better financials, stronger references — and I got my UK visa in 5 weeks. Incredible team.',
                'quote_bn' => 'চলো অ্যাব্রডে আসার আগে আমাকে একবার প্রত্যাখ্যান করা হয়েছিল। তারা আমার পুরো ফাইল পুনর্নির্মাণ করেছে এবং আমি ৫ সপ্তাহে আমার ইউকে ভিসা পেয়েছি।',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Nusrat Jahan Mim',
                'name_bn' => 'নুসরাত জাহান মিম',
                'designation' => 'Bachelor of Business, Monash, Melbourne',
                'designation_bn' => 'ব্যাচেলর অব বিজনেস, মেলবোর্ন',
                'quote' => 'The team was transparent about costs and timelines from day one. No hidden fees, no surprises. My counsellor replied to every WhatsApp message within hours — that level of care is rare.',
                'quote_bn' => 'টিম প্রথম দিন থেকেই খরচ ও সময়সীমা সম্পর্কে স্বচ্ছ ছিল। কোনো লুকানো ফি নেই। আমার কাউন্সেলর ঘণ্টার মধ্যে প্রতিটি বার্তার উত্তর দিতেন।',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Rafiqul Islam',
                'name_bn' => 'রফিকুল ইসলাম',
                'designation' => 'Software Engineer, Berlin, Germany',
                'designation_bn' => 'সফটওয়্যার ইঞ্জিনিয়ার, বার্লিন, জার্মানি',
                'quote' => 'I came with a work visa goal, not study. Cholo Abroad handled the EU Blue Card process completely. I\'m now a software engineer in Berlin. For anyone serious about Germany — go to these guys first.',
                'quote_bn' => 'আমি ওয়ার্ক ভিসার লক্ষ্য নিয়ে এসেছিলাম। চলো অ্যাব্রড ইইউ ব্লু কার্ড প্রক্রিয়া সম্পূর্ণভাবে পরিচালনা করেছে। আমি এখন বার্লিনে সফটওয়্যার ইঞ্জিনিয়ার।',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Saima Akter',
                'name_bn' => 'সাইমা আক্তার',
                'designation' => 'MBBS Student, Seoul National University',
                'designation_bn' => 'এমবিবিএস শিক্ষার্থী, দক্ষিণ কোরিয়া',
                'quote' => 'Korea was not even on my radar until my counsellor suggested it. The KGSP scholarship covered everything. Cholo Abroad handled the 40-page application in two languages. Worth every taka.',
                'quote_bn' => 'কোরিয়া আমার মাথায়ই ছিল না যতক্ষণ না আমার কাউন্সেলর এটি পরামর্শ দিলেন। কেজিএসপি বৃত্তি সব কভার করেছে। চলো অ্যাব্রড ৪০ পৃষ্ঠার আবেদন পরিচালনা করেছে।',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Abdullah Al Mamun',
                'name_bn' => 'আব্দুল্লাহ আল মামুন',
                'designation' => 'MA Economics, Univ. of Amsterdam',
                'designation_bn' => 'এমএ অর্থনীতি, আমস্টারডাম বিশ্ববিদ্যালয়',
                'quote' => 'Three agents told me Netherlands was too competitive. Cholo Abroad did the work, found the right program fit, and got me admitted to Amsterdam. Sometimes you just need someone who won\'t give up.',
                'quote_bn' => 'তিনটি এজেন্ট আমাকে বলেছিল নেদারল্যান্ড অনেক প্রতিযোগিতামূলক। চলো অ্যাব্রড কাজ করেছে এবং আমাকে আমস্টারডামে ভর্তি করিয়েছে।',
                'rating' => 5,
                'active_status' => 1,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
