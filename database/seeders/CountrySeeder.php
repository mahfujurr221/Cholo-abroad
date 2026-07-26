<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Country::create(array (
  'name' => 'Italy',
  'name_bn' => 'ইতালি',
  'slug' => 'italy',
  'description' => 'Study in Italy',
  'description_bn' => 'ইতালিতে পড়াশোনা',
));
    }
}
