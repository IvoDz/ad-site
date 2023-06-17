<?php


namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Category 1',
        ]);

        Category::create([
            'name' => 'Category 2',
        ]);

        Category::create([
            'name' => 'Category 3',
        ]);

        Category::create([
            'name' => 'Category 4',
        ]);

        // Add more categories as needed
    }
}

