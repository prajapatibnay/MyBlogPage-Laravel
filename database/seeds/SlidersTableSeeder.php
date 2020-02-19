<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'src' => 'uploads/logos/'. 'abc.png',
        ]);
    }
}
