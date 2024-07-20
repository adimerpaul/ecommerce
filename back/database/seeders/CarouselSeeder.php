<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Carousel::create(['imagen' => '1.png']);
        Carousel::create(['imagen' => '2.png']);
        Carousel::create(['imagen' => '3.png']);
    }
}
