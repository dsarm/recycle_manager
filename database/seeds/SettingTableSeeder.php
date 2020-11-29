<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

    	DB::table('settings')->insert([
    	    'name' => 'Google Maps API KEY',
    	    'description' => 'Google Maps API KEY',
    	    'code' => 'GOOGLE_MAPS_API_KEY',
    	    'value' => '',
            'created_at' => date("Y-m-d H:i:s")
    	]);

        DB::table('settings')->insert([
            'name' => 'Google Maps Center Point',
            'description' => 'Google Maps Center Point',
            'code' => 'GOOGLE_MAPS_CENTER_POINT',
            'value' => '38.7226023,-27.2160129',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
