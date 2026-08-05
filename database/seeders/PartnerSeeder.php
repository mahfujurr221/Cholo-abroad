<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            ['name' => 'Waikato Institute Of Technology', 'logo' => '1785960233_6a73972912fe3.webp'],
            ['name' => 'Stony Brook University', 'logo' => '1785960233_6a73972915c3e.png'],
            ['name' => 'University Of Massachusetts Boston', 'logo' => '1785960233_6a739729192c2.webp'],
            ['name' => 'Northeastern University', 'logo' => '1785960233_6a7397291a54b.png'],
            ['name' => 'University Of Memphis', 'logo' => '1785960233_6a7397291ecfd.png'],
            ['name' => 'Trent University', 'logo' => '1785960233_6a73972922700.png'],
            ['name' => 'University Of Canada West', 'logo' => '1785960233_6a73972925e71.jpg'],
            ['name' => 'University Of Victoria', 'logo' => '1785960233_6a73972929730.png'],
            ['name' => 'Saskatchewan Polytechnic', 'logo' => '1785960233_6a7397292d2a2.png'],
            ['name' => 'Algoma University', 'logo' => '1785960233_6a73972931098.webp'],
            ['name' => 'University Of Wollongong', 'logo' => '1785960233_6a73972932b03.png'],
            ['name' => 'University Of Nicosia', 'logo' => '1785960233_6a73972936f9d.png'],
            ['name' => 'Griffith University', 'logo' => '1785960233_6a7397293a9c9.png'],
            ['name' => 'Deakin University', 'logo' => '1785960233_6a7397293eaf4.png'],
            ['name' => 'La Trobe University', 'logo' => '1785960233_6a73972941e22.jpg'],
            ['name' => 'University Of Otago', 'logo' => '1785960233_6a7397294550f.jfif'],
            ['name' => 'Victoria University Of Wellington', 'logo' => '1785960233_6a73972946699.png'],
            ['name' => 'Unitec Institute Of Technology', 'logo' => '1785960233_6a73972949ac7.png'],
            ['name' => 'Massey University', 'logo' => '1785960233_6a7397294ccce.png'],
            ['name' => 'Auckland Institute Of Studies', 'logo' => '1785960233_6a73972950053.png'],
        ];

        foreach ($partners as $partnerData) {
            // Only create if the image exists in the folder
            if (File::exists(public_path('uploads/partners/' . $partnerData['logo']))) {
                Partner::firstOrCreate(
                    ['name' => $partnerData['name']],
                    ['logo' => $partnerData['logo']]
                );
            }
        }
        
        Cache::forget('frontend_partners');
    }
}
