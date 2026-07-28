<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        $heroes = [
            [
                'title' => "Your Dream Abroad\nStarts Here",
                'title_bn' => "বিদেশে আপনার স্বপ্ন\nএখানে শুরু হয়",
                'subtitle' => '🌍 Trusted by 12,000+ Bangladeshi students',
                'subtitle_bn' => '🌍 ১২,০০০+ বাংলাদেশি শিক্ষার্থীর বিশ্বাসের পাত্র',
                'description' => 'We handle every document, every visa step, and every deadline — so you can focus on your future, not the paperwork.',
                'description_bn' => 'আমরা প্রতিটি ডকুমেন্ট, ভিসার প্রতিটি ধাপ এবং প্রতিটি ডেডলাইন পরিচালনা করি — যাতে আপনি কাগজপত্রের চিন্তা না করে ভবিষ্যতে মনোযোগ দিতে পারেন।',
                'button_text' => 'Start Free Assessment',
                'button_text_bn' => 'বিনামূল্যে মূল্যায়ন শুরু করুন',
                'button_link' => '/apply',
                'active_status' => 1,
            ],
            [
                'title' => "Study in Canada,\nUK & Europe",
                'title_bn' => "কানাডা, যুক্তরাজ্য ও\nইউরোপে পড়ুন",
                'subtitle' => '✈️ 96% visa approval rate across all destinations',
                'subtitle_bn' => '✈️ সব গন্তব্যে ৯৬% ভিসা অনুমোদনের হার',
                'description' => 'One counsellor owns your file from the first call to the day you land. No department handoffs. No missed deadlines.',
                'description_bn' => 'একজন কাউন্সেলর আপনার প্রথম কলথেকে যেদিন ল্যান্ড করবেন সেদিন পর্যন্ত আপনার ফাইল পরিচালনা করেন। কোনো বিভাগ হস্তান্তর নেই। কোনো ডেডলাইন মিস নেই।',
                'button_text' => 'Explore Countries',
                'button_text_bn' => 'দেশগুলো দেখুন',
                'button_link' => '/countries',
                'active_status' => 1,
            ],
            [
                'title' => "Work Abroad &\nSettle Permanently",
                'title_bn' => "বিদেশে কাজ করুন ও\nস্থায়ীভাবে বসবাস করুন",
                'subtitle' => '🏆 Bangladesh\'s most trusted visa consultancy since 2019',
                'subtitle_bn' => '🏆 ২০১৯ সাল থেকে বাংলাদেশের সবচেয়ে বিশ্বস্ত ভিসা কনসালটেন্সি',
                'description' => 'Work permits, PR pathways, and settlement visas for skilled Bangladeshi professionals — handled by experts who\'ve been through the process themselves.',
                'description_bn' => 'দক্ষ বাংলাদেশি পেশাদারদের জন্য ওয়ার্ক পারমিট, পিআর পাথওয়ে এবং সেটেলমেন্ট ভিসা — বিশেষজ্ঞদের দ্বারা পরিচালিত যারা নিজেরাই এই প্রক্রিয়ার মধ্য দিয়ে গেছেন।',
                'button_text' => 'Apply Now',
                'button_text_bn' => 'এখনই আবেদন করুন',
                'button_link' => '/apply',
                'active_status' => 1,
            ],
        ];

        foreach ($heroes as $hero) {
            Hero::create($hero);
        }
    }
}
