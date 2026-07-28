<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Country & Course Matching',
                'title_bn' => 'দেশ ও কোর্স নির্বাচন',
                'slug' => 'country-course-matching',
                'short_description' => 'We shortlist countries and programs based on your budget, grades, and career goals — not on commission.',
                'short_description_bn' => 'আমরা কমিশনের উপর নয়, আপনার বাজেট, গ্রেড এবং ক্যারিয়ার লক্ষ্যের উপর ভিত্তি করে দেশ ও প্রোগ্রাম বাছাই করি।',
                'description' => '<ul><li>Profile evaluation and gap analysis</li><li>2–3 country shortlist with reasons</li><li>Program-level ranking comparison</li><li>Intake calendar planning</li><li>Budget breakdown per destination</li></ul>',
                'description_bn' => '<ul><li>প্রোফাইল মূল্যায়ন এবং গ্যাপ বিশ্লেষণ</li><li>কারণসহ ২–৩টি দেশের শর্টলিস্ট</li><li>প্রোগ্রাম-স্তরের র‍্যাংকিং তুলনা</li><li>ইনটেক ক্যালেন্ডার পরিকল্পনা</li><li>প্রতিটি গন্তব্যে বাজেট বিশ্লেষণ</li></ul>',
                'active_status' => 1,
            ],
            [
                'title' => 'Document Preparation',
                'title_bn' => 'ডকুমেন্ট প্রস্তুতি',
                'slug' => 'document-preparation',
                'short_description' => 'SOPs, financial proofs, and offer letters — prepared and checked against embassy checklists by experts.',
                'short_description_bn' => 'এসওপি, আর্থিক প্রমাণ এবং অফার লেটার — বিশেষজ্ঞদের দ্বারা দূতাবাসের চেকলিস্টের বিপরীতে তৈরি ও যাচাই করা হয়।',
                'description' => '<ul><li>Statement of Purpose (SOP) writing & editing</li><li>Bank statement advisory and formatting</li><li>Reference & recommendation letter drafts</li><li>Academic transcript verification</li><li>Police clearance & notarisation guidance</li></ul>',
                'description_bn' => '<ul><li>স্টেটমেন্ট অব পারপাস (এসওপি) লেখা ও সম্পাদনা</li><li>ব্যাংক স্টেটমেন্ট পরামর্শ ও ফরম্যাটিং</li><li>রেফারেন্স ও সুপারিশ পত্রের খসড়া</li><li>একাডেমিক ট্রান্সক্রিপ্ট যাচাই</li><li>পুলিশ ক্লিয়ারেন্স ও নোটারাইজেশন গাইডেন্স</li></ul>',
                'active_status' => 1,
            ],
            [
                'title' => 'Visa Filing & Submission',
                'title_bn' => 'ভিসা ফাইলিং ও জমা',
                'slug' => 'visa-filing-submission',
                'short_description' => 'Application submission, embassy scheduling, and biometric appointment booking for every destination we cover.',
                'short_description_bn' => 'আমরা যে প্রতিটি গন্তব্য কভার করি তার জন্য আবেদন জমা, দূতাবাস শিডিউলিং এবং বায়োমেট্রিক অ্যাপয়েন্টমেন্ট বুকিং।',
                'description' => '<ul><li>Online portal application management</li><li>Embassy appointment booking</li><li>Biometrics scheduling and prep</li><li>Real-time application tracking</li><li>Decision letter collection and next steps</li></ul>',
                'description_bn' => '<ul><li>অনলাইন পোর্টাল আবেদন ব্যবস্থাপনা</li><li>দূতাবাস অ্যাপয়েন্টমেন্ট বুকিং</li><li>বায়োমেট্রিক্স শিডিউলিং ও প্রস্তুতি</li><li>রিয়েল-টাইম আবেদন ট্র্যাকিং</li><li>সিদ্ধান্ত পত্র সংগ্রহ ও পরবর্তী পদক্ষেপ</li></ul>',
                'active_status' => 1,
            ],
            [
                'title' => 'Interview Coaching',
                'title_bn' => 'ইন্টারভিউ কোচিং',
                'slug' => 'interview-coaching',
                'short_description' => 'Mock embassy interviews so you walk in confident, not just memorised answers — real preparation for real questions.',
                'short_description_bn' => 'মক দূতাবাস ইন্টারভিউ যাতে আপনি শুধু মুখস্থ উত্তর নয়, আত্মবিশ্বাসের সাথে প্রবেশ করেন — বাস্তব প্রশ্নের জন্য বাস্তব প্রস্তুতি।',
                'description' => '<ul><li>3 rounds of mock interviews</li><li>Country-specific question bank</li><li>Body language and confidence coaching</li><li>Common refusal reason analysis</li><li>Post-interview review and feedback</li></ul>',
                'description_bn' => '<ul><li>৩ রাউন্ড মক ইন্টারভিউ</li><li>দেশ-নির্দিষ্ট প্রশ্নের ব্যাংক</li><li>শারীরিক ভাষা ও আত্মবিশ্বাস কোচিং</li><li>সাধারণ প্রত্যাখ্যানের কারণ বিশ্লেষণ</li><li>ইন্টারভিউ পরবর্তী পর্যালোচনা ও প্রতিক্রিয়া</li></ul>',
                'active_status' => 1,
            ],
            [
                'title' => 'Post-Landing Support',
                'title_bn' => 'অবতরণ পরবর্তী সহায়তা',
                'slug' => 'post-landing-support',
                'short_description' => 'Accommodation search, airport reception, SIM setup, and bank account opening once you touch down in your new country.',
                'short_description_bn' => 'আবাসন অনুসন্ধান, বিমানবন্দর অভ্যর্থনা, সিম সেটআপ এবং ব্যাংক অ্যাকাউন্ট খোলা — নতুন দেশে নামার সাথে সাথেই।',
                'description' => '<ul><li>Temporary accommodation booking</li><li>Airport pickup coordination</li><li>SIM card and mobile plan setup</li><li>Bank account opening assistance</li><li>University enrollment and orientation guidance</li></ul>',
                'description_bn' => '<ul><li>অস্থায়ী আবাসন বুকিং</li><li>বিমানবন্দর পিকআপ সমন্বয়</li><li>সিম কার্ড ও মোবাইল প্ল্যান সেটআপ</li><li>ব্যাংক অ্যাকাউন্ট খোলায় সহায়তা</li><li>বিশ্ববিদ্যালয় ভর্তি ও ওরিয়েন্টেশন গাইডেন্স</li></ul>',
                'active_status' => 1,
            ],
            [
                'title' => 'Work Visa & PR Pathways',
                'title_bn' => 'ওয়ার্ক ভিসা ও পিআর পাথওয়ে',
                'slug' => 'work-visa-pr-pathways',
                'short_description' => 'Skilled worker visas, employer-sponsored permits, and permanent residence applications — for professionals ready to settle abroad.',
                'short_description_bn' => 'দক্ষ কর্মী ভিসা, নিয়োগকর্তা-স্পনসর পারমিট এবং স্থায়ী বাসস্থানের আবেদন — বিদেশে স্থায়ী হতে প্রস্তুত পেশাদারদের জন্য।',
                'description' => '<ul><li>Skilled worker visa eligibility assessment</li><li>Employer sponsorship guidance</li><li>Points-based system applications (Canada Express Entry, UK Skilled Worker)</li><li>Family reunification applications</li><li>Citizenship pathway planning</li></ul>',
                'description_bn' => '<ul><li>দক্ষ কর্মী ভিসা যোগ্যতা মূল্যায়ন</li><li>নিয়োগকর্তা স্পনসরশিপ গাইডেন্স</li><li>পয়েন্ট-ভিত্তিক সিস্টেম আবেদন (কানাডা এক্সপ্রেস এন্ট্রি, যুক্তরাজ্য স্কিলড ওয়ার্কার)</li><li>পরিবার পুনর্মিলন আবেদন</li><li>নাগরিকত্ব পাথওয়ে পরিকল্পনা</li></ul>',
                'active_status' => 1,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
