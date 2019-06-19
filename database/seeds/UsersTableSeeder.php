<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'id' => 1,
			'name' => 'John',
            'lastname' => 'Doe',
            'user_name' => 'Jdoe',
            'email' => 'jdoe@yopmail.com',
            'role_id' => 1,
            'city_id' => 1,
            'password' =>  Hash::make('Prueba2019'),
            'created_at' => '2019-06-18',
            'updated_at' => '2019-06-18'
		]);
    }
}
