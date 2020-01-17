<?php

use Illuminate\Database\Seeder;
use App\Curse;

class CurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curse::create([
        	'grade'	=>	'primer',
        	'section'	=>	'1'
        ]);
    }
}
