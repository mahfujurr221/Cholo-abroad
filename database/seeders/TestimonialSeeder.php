<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create(array (
  'name' => 'John Doe',
  'name_bn' => 'জন ডো',
  'designation' => 'Student',
  'designation_bn' => 'শিক্ষার্থী',
  'message' => 'Great service!',
  'message_bn' => 'দুর্দান্ত সার্ভিস!',
));
    }
}
