<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ResetTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('recycle')->truncate();
        DB::table('recycle_info')->truncate();

        DB::table('recycle_location')->truncate();
        DB::table('recycle_recycle_type')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}