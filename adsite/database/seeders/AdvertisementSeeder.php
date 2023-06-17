<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use App\Models\Category;

class AdvertisementSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $userCount = 10; // Assuming you have 10 dummy users

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                Advertisement::create([
                    'title' => 'Ad ' . $i,
                    'price' => 10.99,
                    'category_id' => $category->id,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'seller_id' => random_int(1, $userCount),
                ]);
            }

            $category->update([
                'amount_of_listings' => $category->advertisements()->count(),
            ]);
        }
    }
}


