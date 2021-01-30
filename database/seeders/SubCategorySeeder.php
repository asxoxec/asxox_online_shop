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
            ["name"=>"အီလက်ထရောနစ်","image"=>"electric.png","category_id"=>1],
            ["name"=>"ကစားစရာများ","image"=>"toys.png","category_id"=>2],
            ["name"=>"လက်ဝတ်ရတနာများ","image"=>"jewellary.png","category_id"=>3],
            ["name"=>"ဖိနပ်များ","image"=>"shoe.png","category_id"=>4],
            ["name"=>"Shirts","image"=>"watch.png","category_id"=>5],


        ];

        foreach($subcategories as $subcategory){
            SubCategory::create([
                'name'=>$subcategory['name'],
                'image'=>$subcategory['image'],
                'category_id'=>$subcategory['category_id']
            ]);
        }
    }
}
