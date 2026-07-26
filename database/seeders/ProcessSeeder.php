<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessSeeder extends Seeder
{
    public function run(): void
    {
        Process::create(array (
  'title' => 'Apply',
  'title_bn' => 'আবেদন',
  'description' => 'Apply to your desired university',
  'description_bn' => 'বিশ্ববিদ্যালয়ে আবেদন করুন',
  'step_number' => 1,
));
    }
}
