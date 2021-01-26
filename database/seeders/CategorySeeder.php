<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            ["name"=>"အိမ်သုံး ပစ္စည်းများ","image"=>"1611390662_user6-128x128.jpg","icon"=>"1611390662_user6-128x128.jpg"],
        ];

        foreach($categories as $category){
            Category::create([
                'name'=>$category['name'],
                'image'=>$category['image'],
                'icon'=>$category['icon']
            ]);
        }
    }
}
