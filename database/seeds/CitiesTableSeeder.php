<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
			'id' => '1',
			'city' => 'BOGOTA',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('cities')->insert([
			'id' => '2',
			'city' => 'CALI',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('cities')->insert([
			'id' => '3',
			'city' => 'BARRANQUILLA',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('cities')->insert([
			'id' => '4',
			'city' => 'MEDELLIN',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
    }
}