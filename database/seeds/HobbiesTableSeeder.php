<?php

use Illuminate\Database\Seeder;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->insert([
			'id' => '1',
			'hobby' => 'Video Juegos',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '2',
			'hobby' => 'Leer',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '3',
			'hobby' => 'Deportes',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '4',
			'hobby' => 'Viajar',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '5',
			'hobby' => 'Cine',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '6',
			'hobby' => 'Tecnologia',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '7',
			'hobby' => 'Yoga',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '8',
			'hobby' => 'Cocina',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '9',
			'hobby' => 'Medicina',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('hobbies')->insert([
			'id' => '10',
			'hobby' => 'Programacion',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
    }
}
