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
            ["name"=>"အိမ်သုံး ပစ္စည်းများ","image"=>"Home_850x.png","icon"=>"home.png"],
            ["name"=>"ကျန်းမာရေး ပစ္စည်းများ","image"=>"g_850x.jpg","icon"=>"medical.png"],
            ["name"=>"အလှအပ ပစ္စည်းများ","image"=>"c_850x.jpg","icon"=>"cosmectic.png"],
            ["name"=>"အားကစားပစ္စည်းများ","image"=>"e_850x.jpg","icon"=>"sports.png"],
            ["name"=>"ထီးများ","image"=>"umbrella_85o.jpg","icon"=>"umbrella.png"],
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
