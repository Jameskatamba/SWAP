<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $created_at = Carbon::createFromTimestamp($faker->dateTimeInInterval("-5 months","+1 hour")->getTimestamp());
        foreach(range(1,500) as $index){
             DB::table("water_consuptions") ->insert([
                "meter_id"=>rand(1,2),
                "amount"=>(rand(10,1000)),
                "created_at"=>$created_at->toDateTimeString()
            ]);
            $created_at->addHour();
        }


    }
}
