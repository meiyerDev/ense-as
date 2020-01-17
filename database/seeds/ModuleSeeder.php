<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
			[
				'name'=>"Abecedario",
				'max_options'=>27,
				'link'=>'/../../recursosJuego/abecedario/Señas Venezolanas El Abecedario_',
			],
			[
				'name'=>"Animales",
				'max_options'=>11,
				'link'=>'../../recursosJuego/animales/ANIMALES EN LSM_HD_',
			],
			[
				'name'=>"Colores",
				'max_options'=>12,
				'link'=>'../../recursosJuego/colores/Los colores_',
			],
			[
				'name'=>"Días de la Semana",
				'max_options'=>7,
				'link'=>'../../recursosJuego/dias/Señas Venezolanas Los dias de la Semana_',
			],
			[
				'name'=>"Meses del Año",
				'max_options'=>12,
				'link'=>'../../recursosJuego/meses/Señas Venezolanas Los meses del año_',
			],
			[
				'name'=>"Números",
				'max_options'=>10,
				'link'=>'../../recursosJuego/numeros/Los numeros_',
			],
			[
				'name'=>"Partes del Cuerpo",
				'max_options'=>10,
				'link'=>'../../recursosJuego/partes_del_cuerpo/PARTES DEL CUERPO Lengua Signos Española CEE Vilagarcía de Arousa_HD_',
			]
        ];

        Module::insert($modules);
    }
}
