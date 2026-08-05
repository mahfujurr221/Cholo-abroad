<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How long does the entire process take from consultation to visa?',
                'question_bn' => 'পরামর্শ থেকে ভিসা পর্যন্ত পুরো প্রক্রিয়ায় কতক্ষণ লাগে?',
                'answer' => 'It depends on the country and visa type. The fastest we\'ve done is 6 weeks (Malaysia Student Pass). Canada and the UK typically take 8–16 weeks. Germany takes the longest at 12–20 weeks due to their document notarisation requirements. We give you a realistic timeline at your free assessment.',
                'answer_bn' => 'এটি দেশ ও ভিসার ধরনের উপর নির্ভর করে। আমাদের সবচেয়ে দ্রুততম হয়েছে ৬ সপ্তাহ (মালয়েশিয়া স্টুডেন্ট পাস)। কানাডা এবং যুক্তরাজ্য সাধারণত ৮–১৬ সপ্তাহ লাগে। আমরা আপনার বিনামূল্যের মূল্যায়নে একটি বাস্তবসম্মত সময়রেখা দিই।',
                'active_status' => 1,
            ],
            [
                'question' => 'What is your fee structure? Are there any hidden charges?',
                'question_bn' => 'আপনার ফি কাঠামো কী? কোনো লুকানো চার্জ আছে?',
                'answer' => 'We charge a fixed service fee that covers everything from document review to visa submission. The full breakdown is given upfront before you sign anything. There are no surprise charges mid-process. Visa fees, IELTS, and travel costs are separate but we\'ll estimate them for you at the start.',
                'answer_bn' => 'আমরা একটি নির্দিষ্ট সার্ভিস ফি নিই যা ডকুমেন্ট পর্যালোচনা থেকে ভিসা জমা পর্যন্ত সব কিছু কভার করে। আপনি কিছু সাইন করার আগে পূর্ণ বিশদ বিবরণ দেওয়া হয়। প্রক্রিয়ার মাঝপথে কোনো বিস্ময়কর চার্জ নেই।',
                'active_status' => 1,
            ],
            [
                'question' => 'My previous visa was refused. Can you still help me?',
                'question_bn' => 'আমার আগের ভিসা প্রত্যাখ্যান করা হয়েছিল। আপনি কি এখনও আমাকে সাহায্য করতে পারবেন?',
                'answer' => 'Yes — and this is actually one of our specialties. We\'ve helped dozens of students with prior refusals get approved by completely rebuilding their file. The key is understanding why the refusal happened. Bring your refusal letter to your free assessment and we\'ll give you an honest opinion on your chances.',
                'answer_bn' => 'হ্যাঁ — এবং এটি আসলে আমাদের বিশেষত্বগুলির মধ্যে একটি। আমরা তাদের ফাইল সম্পূর্ণরূপে পুনর্নির্মাণ করে পূর্ববর্তী প্রত্যাখ্যান সহ ডজন ডজন শিক্ষার্থীকে অনুমোদিত হতে সাহায্য করেছি।',
                'active_status' => 1,
            ],
            [
                'question' => 'Do I need IELTS to apply through Cholo Abroad?',
                'question_bn' => 'চলো অ্যাব্রডের মাধ্যমে আবেদন করতে কি আমার আইইএলটিএস প্রয়োজন?',
                'answer' => 'Most English-speaking countries (Canada, UK, Australia, USA) require IELTS or an equivalent. Germany and South Korea have more flexible language requirements depending on your program. Malaysia and some European countries have pathways without IELTS. We\'ll tell you exactly what\'s needed for your chosen destination at the assessment.',
                'answer_bn' => 'বেশিরভাগ ইংরেজি-ভাষী দেশ (কানাডা, যুক্তরাজ্য, অস্ট্রেলিয়া, যুক্তরাষ্ট্র) আইইএলটিএস বা সমতুল্য প্রয়োজন। জার্মানি এবং দক্ষিণ কোরিয়ায় আপনার প্রোগ্রামের উপর নির্ভর করে আরও নমনীয় ভাষার প্রয়োজনীয়তা রয়েছে।',
                'active_status' => 1,
            ],
            [
                'question' => 'Can family members apply together for a study visa?',
                'question_bn' => 'পরিবারের সদস্যরা কি একসাথে স্টাডি ভিসার জন্য আবেদন করতে পারেন?',
                'answer' => 'In many countries, your spouse and dependent children can accompany you on a dependent visa while you study. Canada, UK, and Australia have strong dependent pathways. The dependent can often work part-time as well. We include dependent applications in our full-file service.',
                'answer_bn' => 'অনেক দেশে, আপনার স্বামী/স্ত্রী এবং নির্ভরশীল শিশুরা আপনি পড়াশোনা করার সময় একটি নির্ভরশীল ভিসায় আপনার সাথে আসতে পারেন। কানাডা, যুক্তরাজ্য এবং অস্ট্রেলিয়ায় শক্তিশালী নির্ভরশীল পাথওয়ে রয়েছে।',
                'active_status' => 1,
            ],
            [
                'question' => 'What happens if my visa is refused even after using your service?',
                'question_bn' => 'আপনার সেবা ব্যবহার করার পরেও যদি আমার ভিসা প্রত্যাখ্যান হয় তাহলে কী হবে?',
                'answer' => 'Refusals are rare with us — our approval rate is 96%+ — but they do happen. In case of a refusal, we conduct a full review of the refusal reasons at no extra cost and advise on the best reapplication strategy, including alternative destinations if appropriate. We don\'t walk away when things get hard.',
                'answer_bn' => 'আমাদের সাথে প্রত্যাখ্যান বিরল — আমাদের অনুমোদনের হার ৯৬%+ — তবে এটি ঘটে। প্রত্যাখ্যানের ক্ষেত্রে, আমরা কোনো অতিরিক্ত খরচ ছাড়াই প্রত্যাখ্যানের কারণগুলির সম্পূর্ণ পর্যালোচনা করি।',
                'active_status' => 1,
            ],
            [
                'question' => 'Do you have offices outside Dhaka?',
                'question_bn' => 'ঢাকার বাইরে কি আপনার অফিস আছে?',
                'answer' => 'Our main office is in Uttara, Dhaka. However, we work with students from all over Bangladesh — Chittagong, Sylhet, Rajshahi, Khulna, Barishal, and beyond — through WhatsApp, Zoom, and phone consultations. Distance is not a barrier to starting your file with us.',
                'answer_bn' => 'আমাদের প্রধান অফিস উত্তরা, ঢাকায়। তবে, আমরা সারা বাংলাদেশ থেকে শিক্ষার্থীদের সাথে কাজ করি — চট্টগ্রাম, সিলেট, রাজশাহী, খুলনা, বরিশাল এবং তার বাইরে — হোয়াটসঅ্যাপ, জুম এবং ফোন পরামর্শের মাধ্যমে।',
                'active_status' => 1,
            ],
            [
                'question' => 'আমি কি বাংলায় পরামর্শ নিতে পারি?',
                'question_bn' => 'আমি কি বাংলায় পরামর্শ নিতে পারি?',
                'answer' => 'Absolutely. All our counsellors are Bangladeshi and speak fluent Bangla. We conduct consultations entirely in Bangla if that\'s your preference. Our documents are English (as required by embassies), but every conversation, every explanation, and every question can be handled in your mother tongue.',
                'answer_bn' => 'অবশ্যই। আমাদের সকল কাউন্সেলর বাংলাদেশি এবং সাবলীল বাংলায় কথা বলেন। আমরা সম্পূর্ণভাবে বাংলায় পরামর্শ পরিচালনা করি যদি সেটি আপনার পছন্দ হয়। আমাদের ডকুমেন্ট ইংরেজিতে (দূতাবাসের প্রয়োজনীয়তা অনুযায়ী), কিন্তু প্রতিটি কথোপকথন আপনার মাতৃভাষায় হতে পারে।',
                'active_status' => 1,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // Add some country-specific FAQs
        $canada = \App\Models\Country::where('slug', 'canada')->first();
        if ($canada) {
            Faq::create([
                'country_id' => $canada->id,
                'question' => 'Can I work in Canada while studying?',
                'answer' => 'Yes, international students in Canada can work up to 20 hours per week during academic sessions and full-time during scheduled breaks.',
                'active_status' => 1,
            ]);
            Faq::create([
                'country_id' => $canada->id,
                'question' => 'What is the Post-Graduation Work Permit (PGWP)?',
                'answer' => 'The PGWP allows students who have graduated from eligible Canadian designated learning institutions to obtain an open work permit to gain valuable Canadian work experience.',
                'active_status' => 1,
            ]);
        }

        $uk = \App\Models\Country::where('slug', 'united-kingdom')->first();
        if ($uk) {
            Faq::create([
                'country_id' => $uk->id,
                'question' => 'What is the Graduate Route visa in the UK?',
                'answer' => 'The Graduate Route visa allows international students to stay in the UK and work, or look for work, for two years (three years for PhD students) after successfully completing their studies.',
                'active_status' => 1,
            ]);
            Faq::create([
                'country_id' => $uk->id,
                'question' => 'Can I bring my family with me to the UK?',
                'answer' => 'If you are studying a postgraduate degree that lasts 9 months or longer, or a government-sponsored program, you may be able to bring your spouse and children as dependents.',
                'active_status' => 1,
            ]);
        }

        $australia = \App\Models\Country::where('slug', 'australia')->first();
        if ($australia) {
            Faq::create([
                'country_id' => $australia->id,
                'question' => 'What are the post-study work rights in Australia?',
                'answer' => 'Australia offers a Temporary Graduate visa (subclass 485) that allows international students to live, study, and work in Australia temporarily after finishing their studies. The duration depends on your qualifications.',
                'active_status' => 1,
            ]);
        }
    }
}
