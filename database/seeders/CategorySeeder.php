<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'NEC',
            'Legal Audit',
            'TCR',
            'Certified Copy',
            'Mortgage',
            'Translation Memo',
            'Wetting Certificate',
            'Consortium Drafting',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
