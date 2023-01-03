<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tests = [
            ["name"=>"test1"],
            ["name"=>"test2"],
            ["name"=>"test5"],
        ];
        DB::table('tests')->delete();
        DB::table('tests')->insert($tests);
    }
}
