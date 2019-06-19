<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
			'id' => '1',
			'role' => 'administrador',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
		DB::table('roles')->insert([
			'id' => '2',
			'role' => 'usuario',
			'created_at'   => ' 2019-06-18',
			'updated_at'   => '2019-06-18' 
		]);
    }
}
