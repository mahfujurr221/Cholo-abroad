<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        AboutUs::create([
            'title' => 'Founded by people who went through it themselves',
            'title_bn' => 'যারা নিজেরাই এটি অনুভব করেছেন তাদের দ্বারা প্রতিষ্ঠিত',
            'description' => '<p>Cholo Abroad was founded in 2019 in Dhaka by a small team of former international students who each went through the visa process the hard way — rejected paperwork, missed intakes, and agents who disappeared after taking a fee.</p><p>Today, that same team runs a <strong>counsellor-owns-the-file model</strong>: one person sees your case from the first call to the day you land, instead of passing you between departments. It\'s slower to scale, but it\'s why our approval rate holds above 96% across every destination we cover.</p><p>We currently serve students and professionals from across Bangladesh — from Dhaka and Chittagong to Sylhet, Rajshahi, and Barishal — helping them navigate the systems of 8+ countries.</p>',
            'description_bn' => '<p>চলো অ্যাব্রড ২০১৯ সালে ঢাকায় প্রাক্তন আন্তর্জাতিক শিক্ষার্থীদের একটি ছোট দল দ্বারা প্রতিষ্ঠিত হয়েছিল যারা প্রত্যেকে কঠিন পথে ভিসা প্রক্রিয়ার মধ্য দিয়ে গিয়েছিলেন।</p><p>আজ, সেই একই দল <strong>কাউন্সেলর-ওনস-দ্য-ফাইল মডেল</strong> পরিচালনা করে: একজন ব্যক্তি আপনার প্রথম কল থেকে যেদিন আপনি অবতরণ করবেন সেদিন পর্যন্ত আপনার কেসটি দেখেন।</p><p>আমরা বর্তমানে সারা বাংলাদেশের শিক্ষার্থী ও পেশাদারদের সেবা দিচ্ছি — ঢাকা ও চট্টগ্রাম থেকে সিলেট, রাজশাহী ও বরিশাল পর্যন্ত।</p>',
            'mission' => 'Make international education accessible to every qualified Bangladeshi, regardless of their city, network, or prior knowledge of the system.',
            'mission_bn' => 'প্রতিটি যোগ্য বাংলাদেশির কাছে আন্তর্জাতিক শিক্ষাকে সহজলভ্য করা, তাদের শহর, নেটওয়ার্ক বা সিস্টেমের পূর্ব জ্ঞান নির্বিশেষে।',
            'vision' => 'A Bangladesh where every deserving student and professional can confidently navigate the path to their global future — without needing connections, without overpaying, and without the fear of being misled.',
            'vision_bn' => 'এমন একটি বাংলাদেশ যেখানে প্রতিটি যোগ্য শিক্ষার্থী ও পেশাদার তাদের বৈশ্বিক ভবিষ্যতের পথে আত্মবিশ্বাসের সাথে এগিয়ে যেতে পারে।',
            'active_status' => 1,
        ]);
    }
}
