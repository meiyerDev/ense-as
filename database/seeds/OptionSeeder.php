<?php

use Illuminate\Database\Seeder;
use App\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
			[
				'name' => 'Lunes',
				'number_option' => '1',
				'module_id' => 4,
			],
			[
				'name' => 'Martes',
				'number_option' => '2',
				'module_id' => 4,
			],
			[
				'name' => 'Miércoles',
				'number_option' => '3',
				'module_id' => 4,
			],
			[
				'name' => 'Jueves',
				'number_option' => '4',
				'module_id' => 4,
			],
			[
				'name' => 'Viernes',
				'number_option' => '5',
				'module_id' => 4,
			],
			[
				'name' => 'Sábado',
				'number_option' => '6',
				'module_id' => 4,
			],
			[
				'name' => 'Domingo',
				'number_option' => '7',
				'module_id' => 4,
			],
        ];

        Option::insert($options);
    }
}
