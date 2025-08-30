<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Web development',
            'Frontedn',
            'Backend',
            'Mobile development',
            'Desktop development',
            'Game development',
            'UI/UX design'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
