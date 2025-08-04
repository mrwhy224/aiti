<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'تکنولوژی',
            'برنامه نویسی',
            'لاراول',
            'توسعه وب',
            'آموزش',
            'سبک زندگی',
            'بهره وری'
        ];

        foreach ($tags as $tagName) {
            Tag::firstOrCreate([
                'name' => $tagName,
            ]);
        }
    }
}
