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
            'title_bn' => 'আমাদের গল্প',
            'description' => '<p>Cholo Abroad was founded in 2019 in Dhaka by a small team of former international students who each went through the visa process the hard way — rejected paperwork, missed intakes, and agents who disappeared after taking a fee.</p><p>Today, that same team runs a <strong>counsellor-owns-the-file model</strong>: one person sees your case from the first call to the day you land, instead of passing you between departments. It\'s slower to scale, but it\'s why our approval rate holds above 96% across every destination we cover.</p><p>We currently serve students and professionals from across Bangladesh — from Dhaka and Chittagong to Sylhet, Rajshahi, and Barishal — helping them navigate the systems of 8+ countries.</p>',
            'description_bn' => '<p>বিদেশে উচ্চশিক্ষার স্বপ্ন অনেকেরই থাকে। কিন্তু সেই স্বপ্নের পথে থাকে অসংখ্য প্রশ্ন, বিভ্রান্তি আর অনিশ্চয়তা। কোন দেশে পড়বেন? কোন বিশ্ববিদ্যালয় আপনার জন্য উপযুক্ত? কীভাবে আবেদন করবেন? ভিসা হবে তো?</p><p>এই প্রশ্নগুলোর উত্তর খুঁজতে গিয়ে অনেক শিক্ষার্থী ভুল তথ্য, অপ্রয়োজনীয় খরচ এবং ভুল সিদ্ধান্তের শিকার হন।</p><p>সেখান থেকেই Cholo Abroad-এর যাত্রা।</p><p>আমরা নিজেদের শুধু একটি "স্টাডি অ্যাব্রড এজেন্সি" হিসেবে দেখি না। আমরা বিশ্বাস করি, প্রতিটি শিক্ষার্থীর স্বপ্নের পেছনে একটি পরিবার, একটি ভবিষ্যৎ এবং অসংখ্য প্রত্যাশা জড়িয়ে থাকে।</p><p>তাই আমাদের কাজ শুধুমাত্র বিশ্ববিদ্যালয়ে আবেদন করা নয়। আমাদের কাজ হলো সঠিক তথ্য, সৎ পরামর্শ এবং নির্ভরযোগ্য সহায়তার মাধ্যমে আপনাকে এমন সিদ্ধান্ত নিতে সাহায্য করা, যা আপনার ভবিষ্যতের জন্য সত্যিই উপযুক্ত।</p><p>আমরা চাই, বিদেশে পড়াশোনার যাত্রা শুরু হোক আত্মবিশ্বাস দিয়ে, ভয় বা বিভ্রান্তি দিয়ে নয়।</p><p>এটাই Cholo Abroad-এর প্রতিশ্রুতি।</p>',
            'mission' => 'বাংলাদেশের শিক্ষার্থীদের জন্য আন্তর্জাতিক উচ্চশিক্ষার পথকে সহজ, স্বচ্ছ ও নির্ভরযোগ্য করে তোলা।',
            'mission_bn' => 'বাংলাদেশের শিক্ষার্থীদের জন্য আন্তর্জাতিক উচ্চশিক্ষার পথকে সহজ, স্বচ্ছ ও নির্ভরযোগ্য করে তোলা।',
            'vision' => 'আমরা এমন একটি বাংলাদেশ দেখতে চাই, যেখানে দেশের তরুণরা বিশ্বের সেরা শিক্ষা ও সুযোগ গ্রহণ করবে, নতুন জ্ঞান ও অভিজ্ঞতা অর্জন করবে এবং একদিন সেই অর্জনের মাধ্যমে বাংলাদেশকে আরও সমৃদ্ধ করবে।',
            'vision_bn' => 'আমরা এমন একটি বাংলাদেশ দেখতে চাই, যেখানে দেশের তরুণরা বিশ্বের সেরা শিক্ষা ও সুযোগ গ্রহণ করবে, নতুন জ্ঞান ও অভিজ্ঞতা অর্জন করবে এবং একদিন সেই অর্জনের মাধ্যমে বাংলাদেশকে আরও সমৃদ্ধ করবে।',
            'active_status' => 1,
            'value_1_title' => 'One counsellor, one file',
            'value_1_desc' => 'Your case is never split across departments — the person who takes your first call is the one who sees you through to departure.',
            'value_2_title' => 'Fixed fees, upfront',
            'value_2_desc' => 'বাংলাদেশের শিক্ষার্থীদের জন্য আন্তর্জাতিক উচ্চশিক্ষার পথকে সহজ, স্বচ্ছ ও নির্ভরযোগ্য করে তোলা। সঠিক দিকনির্দেশনা এবং পরামর্শের মাধ্যমে তাদের এমন একটি ভবিষ্যতের দিকে এগিয়ে নিতে চাই, যেখানে তারা বিশ্বে নিজের জায়গা তৈরি করবে, তবে নিজের শিকড় কখনো ভুলে যাবে না।',
            'value_3_title' => 'Honest eligibility calls',
            'value_3_desc' => 'If your profile is a weak fit for a country, we say so in the free assessment — not after you\'ve paid.',
            'stat_1_value' => '2019',
            'stat_1_label' => 'Founded in Dhaka',
            'stat_2_value' => '12k+',
            'stat_2_label' => 'Applications filed',
            'stat_3_value' => '96%',
            'stat_3_label' => 'Peak approval rate',
            'stat_4_value' => '8',
            'stat_4_label' => 'Countries covered',
        ]);
    }
}
