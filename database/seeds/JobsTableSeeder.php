<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'job_title'=> str_random(10),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
