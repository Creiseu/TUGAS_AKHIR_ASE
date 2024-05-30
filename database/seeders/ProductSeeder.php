<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
       $Movies = [
            [
                'name' => 'Hancock',
                'tag' => 'Peter Berg',
                'description' => 'anjay',
                'stocks' => 80,
                'category' => 'Men',
                'image' => 'https://assets-in.bmscdn.com/iedb/movies/images/extra/vertical_logo/mobile/thumbnail/xxlarge/hancock-et00000995-10-03-2021-03-48-47.jpg',
                'price' => 299,
                'created_by' => 1,
                'updated_by' => 1
            ],
        ];
        foreach ($Movies as $key => $value) {
            Product::create($value);
        }
    }
}
