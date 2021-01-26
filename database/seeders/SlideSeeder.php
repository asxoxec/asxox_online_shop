<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image=[
            'slide_1.png',
            'slide_2.png',
            'slide_3.png',
        ];

    for ($i=0; $i <count($image) ; $i++) {

        Slide::create([
            'image'=>$image[$i]
        ]);
    }
    }
}
