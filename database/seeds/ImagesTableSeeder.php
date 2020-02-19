<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'src' => 'uploads/logos/'. 'abc.png',
        ]);
    }
}
