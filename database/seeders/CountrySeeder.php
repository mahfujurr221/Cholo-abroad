<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Canada',
                'name_bn' => 'কানাডা',
                'slug' => 'canada',
                'description' => 'Canada offers world-class universities, post-study work permits, and one of the most accessible pathways to permanent residence. Popular programs: Engineering, Business, IT, Healthcare. Processing time: 6–12 weeks.',
                'description_bn' => 'কানাডায় বিশ্বমানের বিশ্ববিদ্যালয়, পড়াশোনার পরে ওয়ার্ক পারমিট এবং স্থায়ী বাসস্থানের সবচেয়ে সহজ পথগুলির একটি রয়েছে। জনপ্রিয় প্রোগ্রাম: ইঞ্জিনিয়ারিং, ব্যবসা, আইটি, স্বাস্থ্যসেবা।',
                'flag_icon' => '🇨🇦',
                'active_status' => 1,
            ],
            [
                'name' => 'United Kingdom',
                'name_bn' => 'যুক্তরাজ্য',
                'slug' => 'united-kingdom',
                'description' => 'The UK is home to some of the world\'s oldest and most respected universities — Oxford, Cambridge, Imperial, and LSE. The Graduate Route visa allows 2 years of post-study work. Processing time: 3–8 weeks.',
                'description_bn' => 'যুক্তরাজ্যে বিশ্বের কিছু প্রাচীনতম ও সম্মানিত বিশ্ববিদ্যালয় রয়েছে — অক্সফোর্ড, ক্যামব্রিজ, ইম্পেরিয়াল এবং এলএসই। গ্র্যাজুয়েট রুট ভিসা পড়াশোনার পরে ২ বছর কাজের সুযোগ দেয়।',
                'flag_icon' => '🇬🇧',
                'active_status' => 1,
            ],
            [
                'name' => 'Australia',
                'name_bn' => 'অস্ট্রেলিয়া',
                'slug' => 'australia',
                'description' => 'Australia\'s skilled migration system and post-study work rights make it ideal for career-focused students. Melbourne and Sydney consistently rank among the world\'s most liveable cities. Processing time: 4–8 weeks.',
                'description_bn' => 'অস্ট্রেলিয়ার দক্ষ অভিবাসন ব্যবস্থা এবং পড়াশোনার পরে কাজের অধিকার ক্যারিয়ার-মনোযোগী শিক্ষার্থীদের জন্য আদর্শ। মেলবোর্ন ও সিডনি বিশ্বের সবচেয়ে বাসযোগ্য শহরগুলির মধ্যে ধারাবাহিকভাবে স্থান পায়।',
                'flag_icon' => '🇦🇺',
                'active_status' => 1,
            ],
            [
                'name' => 'Germany',
                'name_bn' => 'জার্মানি',
                'slug' => 'germany',
                'description' => 'Germany offers tuition-free education at public universities and a booming economy hungry for skilled workers. A Job Seeker Visa lets you stay 18 months after graduation to find work. Processing time: 6–12 weeks.',
                'description_bn' => 'জার্মানিতে পাবলিক বিশ্ববিদ্যালয়ে টিউশন-মুক্ত শিক্ষা এবং দক্ষ কর্মীদের জন্য একটি দ্রুত বর্ধমান অর্থনীতি রয়েছে। জব সিকার ভিসা আপনাকে স্নাতকের পরে ১৮ মাস থাকার সুযোগ দেয়।',
                'flag_icon' => '🇩🇪',
                'active_status' => 1,
            ],
            [
                'name' => 'Malaysia',
                'name_bn' => 'মালয়েশিয়া',
                'slug' => 'malaysia',
                'description' => 'Malaysia is the most affordable destination for Bangladeshi students, with English-medium universities and a Student Pass that\'s among the fastest to obtain. Cost of living is 60% lower than Western Europe. Processing time: 2–4 weeks.',
                'description_bn' => 'মালয়েশিয়া বাংলাদেশি শিক্ষার্থীদের জন্য সবচেয়ে সাশ্রয়ী গন্তব্য, ইংরেজি মাধ্যম বিশ্ববিদ্যালয় সহ এবং দ্রুততম স্টুডেন্ট পাস নেওয়ার সুযোগ রয়েছে।',
                'flag_icon' => '🇲🇾',
                'active_status' => 1,
            ],
            [
                'name' => 'South Korea',
                'name_bn' => 'দক্ষিণ কোরিয়া',
                'slug' => 'south-korea',
                'description' => 'South Korea is rapidly growing as a study destination, with world-leading tech universities and generous government scholarships (KGSP). Seoul is one of Asia\'s most dynamic cities. Processing time: 4–8 weeks.',
                'description_bn' => 'দক্ষিণ কোরিয়া একটি পড়াশোনার গন্তব্য হিসেবে দ্রুত বৃদ্ধি পাচ্ছে, বিশ্বমানের প্রযুক্তি বিশ্ববিদ্যালয় এবং উদার সরকারি বৃত্তি (কেজিএসপি) সহ।',
                'flag_icon' => '🇰🇷',
                'active_status' => 1,
            ],
            [
                'name' => 'United States',
                'name_bn' => 'যুক্তরাষ্ট্র',
                'slug' => 'united-states',
                'description' => 'The USA has the world\'s largest international student community and universities ranked #1 to #10 globally. Optional Practical Training (OPT) lets STEM graduates work for up to 3 years. Processing time: 3–6 weeks.',
                'description_bn' => 'যুক্তরাষ্ট্রে বিশ্বের সবচেয়ে বড় আন্তর্জাতিক শিক্ষার্থী সম্প্রদায় রয়েছে এবং বিশ্বের শীর্ষ ১ থেকে ১০ র‍্যাংকের বিশ্ববিদ্যালয় রয়েছে।',
                'flag_icon' => '🇺🇸',
                'active_status' => 1,
            ],
            [
                'name' => 'Italy',
                'name_bn' => 'ইতালি',
                'slug' => 'italy',
                'description' => 'Italy offers affordable tuition, a rich cultural experience, and growing opportunities in fashion, design, engineering, and food sciences. Many programs are taught in English. Processing time: 4–10 weeks.',
                'description_bn' => 'ইতালিতে সাশ্রয়ী টিউশন, সমৃদ্ধ সাংস্কৃতিক অভিজ্ঞতা এবং ফ্যাশন, ডিজাইন, ইঞ্জিনিয়ারিং ও খাদ্য বিজ্ঞানে ক্রমবর্ধমান সুযোগ রয়েছে।',
                'flag_icon' => '🇮🇹',
                'active_status' => 1,
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
