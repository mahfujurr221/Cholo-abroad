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
                'name' => 'Mohammad Rafi',
                'name_bn' => 'মোহাম্মদ রফি',
                'designation' => 'Engineering student, Toronto, Canada',
                'country_name' => 'New Zealand',
                'past_school' => 'Dhaka College',
                'program' => 'Bachelor of Food Science',
                'university' => 'University of Otago',
                'designation_bn' => 'ইঞ্জিনিয়ারিং শিক্ষার্থী, কানাডা',
                'quote' => 'চলো অ্যাব্রডের গাইডলাইন আর সাপোর্ট আমার স্বপ্নকে বাস্তবে পরিণত করতে অনেক সাহায্য করেছে!',
                'quote_bn' => 'চলো অ্যাব্রডের গাইডলাইন আর সাপোর্ট আমার স্বপ্নকে বাস্তবে পরিণত করতে অনেক সাহায্য করেছে!',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Nusrat Jahan',
                'name_bn' => 'নুসরাত জাহান',
                'designation' => 'MSc Computer Science, Manchester, UK',
                'country_name' => 'Canada',
                'past_school' => 'Viqarunnisa Noon College',
                'program' => 'Masters in Data Science',
                'university' => 'University of Toronto',
                'designation_bn' => 'এমএসসি কম্পিউটার বিজ্ঞান, যুক্তরাজ্য',
                'quote' => 'প্রতিটি ধাপে সহজভাবে বুঝিয়েছে চলো অ্যাব্রড। প্রতিটি ধাপে পাশে ছিল তারা, সত্যিই কৃতজ্ঞ!',
                'quote_bn' => 'প্রতিটি ধাপে সহজভাবে বুঝিয়েছে চলো অ্যাব্রড। প্রতিটি ধাপে পাশে ছিল তারা, সত্যিই কৃতজ্ঞ!',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Tanvir Ahmed',
                'name_bn' => 'তানভীর আহমেদ',
                'designation' => 'Bachelor of Business, Monash, Melbourne',
                'country_name' => 'United Kingdom',
                'past_school' => 'Notre Dame College',
                'program' => 'MSc in Computer Science',
                'university' => 'University of Manchester',
                'designation_bn' => 'ব্যাচেলর অব বিজনেস, মেলবোর্ন',
                'quote' => 'সঠিক পরামর্শ, দ্রুত রেসপন্স এবং ভিসা পর্যন্ত পুরো জার্নিটা ছিল অনেক স্মুথ। ধন্যবাদ চলো অ্যাব্রড টিমকে!',
                'quote_bn' => 'সঠিক পরামর্শ, দ্রুত রেসপন্স এবং ভিসা পর্যন্ত পুরো জার্নিটা ছিল অনেক স্মুথ। ধন্যবাদ চলো অ্যাব্রড টিমকে!',
                'rating' => 5,
                'active_status' => 1,
            ],
            [
                'name' => 'Rafiqul Islam',
                'name_bn' => 'রফিকুল ইসলাম',
                'designation' => 'Software Engineer, Berlin, Germany',
                'country_name' => 'Germany',
                'past_school' => 'BUET',
                'program' => 'MSc Software Engineering',
                'university' => 'Technical University of Berlin',
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
                'country_name' => 'South Korea',
                'past_school' => 'Holy Cross College',
                'program' => 'MBBS',
                'university' => 'Seoul National University',
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
                'country_name' => 'Netherlands',
                'past_school' => 'Dhaka University',
                'program' => 'MA Economics',
                'university' => 'University of Amsterdam',
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
