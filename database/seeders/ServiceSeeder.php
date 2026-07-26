<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create(array (
  'title' => 'Visa Processing',
  'title_bn' => 'ভিসা প্রসেসিং',
  'slug' => 'visa-processing',
  'short_description' => 'Fast visa processing',
  'short_description_bn' => 'দ্রুত ভিসা প্রসেসিং',
));
    }
}
