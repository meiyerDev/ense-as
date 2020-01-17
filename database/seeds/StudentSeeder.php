<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\{Student,Score};

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
			'firstname' => 'Carlos',
		    'lastname' => 'Garcia',
		    'identity' => '10100100',
		    'gender' => 'Masculino',
		    'finish' => new Carbon('02-10-2007'),
		    'mobileno' => '04124566545',
		    'representant' => 'Rosa Delgado',
		    'address' => 'Centro de San Juan',
		    'curse_id' => 1,
        ];

        $student = Student::create($students);

        $scores = [
            'module_id' => 4,
            'student_id' => $student->id,
            'score' => 0
        ];

        Score::create($scores);
    }
}
