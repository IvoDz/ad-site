<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class UpdateCategoryListingsCountSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $listingsCount = $category->advertisements()->count();

            $category->update([
                'amount_of_listings' => $listingsCount,
            ]);
        }
    }
}
