<?php

use Illuminate\Database\Seeder;

class FromCSV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = dirname(__FILE__) . '/seed.csv';
        $csv = array_map('str_getcsv', file($file));

        // Remove the header which contains the dates.
        $header = array_shift($csv);
        $dates  = array_slice($header, 3);

        foreach ($csv as $person_row) {
            $person_name     = array_shift($person_row);
            $department_name = array_shift($person_row);
            $active          = (boolean) array_shift($person_row);

            $department = \App\Department::updateOrCreate([
                'name' => $department_name
            ]);

            $person = $department->people()->updateOrCreate([
                'name'   => $person_name,
                'active' => $active
            ], [ 'name' => $person_name ]);
        }

    }
}
