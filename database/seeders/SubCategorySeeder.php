<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories=[
            ["name"=>"အီလက်ထရောနစ်","image"=>"1611390687_user8-128x128.jpg"],
        ];

        foreach($subcategories as $subcategory){
            SubCategory::create([
                'name'=>$subcategory['name'],
                'image'=>$subcategory['image'],
                'category_id'=>1
            ]);
        }
    }
}
