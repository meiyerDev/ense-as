<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		User::create([
    			'name'	=>	'root',
                'email' =>  'admin@gmail.com',
    			'type'	=>	'admin',
    			'password' => bcrypt('1234')
    		]);
            User::create([
                'name'  =>  'admin',
                'email' =>  'director@gmail.com',
                'type'  =>  'director',
                'password' => bcrypt('1234')
            ]);
    }
}
