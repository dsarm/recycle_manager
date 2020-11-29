<?php

use Illuminate\Database\Seeder;
use Recycle\RecycleType;

class RecycleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('recycle_type')->truncate();

        RecycleType::create(array(
            "name" => "Paper",
            "slug" => "paper",
            "description" => "",
            "color" => "#1D89E4"
        ));

        RecycleType::create(array(
            "name" => "Plastic",
            "slug" => "plastic",
            "description" => "",
            "color" => "#FB8C00"
        ));

        RecycleType::create(array(
            "name" => "Glass",
            "slug" => "glass",
            "description" => "",
            "color" => "#7DB343"
        ));

        RecycleType::create(array(
            "name" => "Organic",
            "slug" => "organic",
            "description" => "",
            "color" => "#757575"
        ));

        RecycleType::create(array(
            "name" => "Oil",
            "slug" => "oil",
            "description" => "",
            "color" => "black"
        ));

        RecycleType::create(array(
            "name" => "Bateries",
            "slug" => "bateries",
            "description" => "",
            "color" => "#EE534F"
        ));

        RecycleType::create(array(
            "name" => "Metal",
            "slug" => "metal",
            "description" => "",
            "color" => "#FCC02E"
        ));

        RecycleType::create(array(
            "name" => "Electronics",
            "slug" => "electronics",
            "description" => "",
            "color" => "#EE534F"
        ));

        RecycleType::create(array(
            "name" => "Clothes",
            "slug" => "clothes",
            "description" => "",
            "color" => "white"
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
