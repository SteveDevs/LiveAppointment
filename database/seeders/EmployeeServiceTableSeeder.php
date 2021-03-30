<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = 
        [
            [
                "employee_id" => 1,
                "service_id" => 1
            ],
            [
                "employee_id" => 1,
                "service_id" => 2
            ],
            [
                "employee_id" => 1,
                "service_id" => 3
            ],
            [
                "employee_id" => 2,
                "service_id" => 1
            ],
            [
                "employee_id" => 2,
                "service_id" => 2
            ],
            [
                "employee_id" => 2,
                "service_id" => 3
            ],
            [
                "employee_id" => 3,
                "service_id" => 1
            ],
            [
                "employee_id" => 3,
                "service_id" => 4
            ],
            [
                "employee_id" => 4,
                "service_id" => 5
            ],
            [
                "employee_id" => 4,
                "service_id" => 6
            ],
            [  
                "employee_id" => 5,
                "service_id" => 6
            ],
            [
                "employee_id" => 6,
                "service_id" => 1
            ],
            [
                "employee_id" => 7,
                "service_id" => 5
            ],
            [
                "employee_id" => 8,
                "service_id" => 4
            ],
            [
                "employee_id" => 9,
                "service_id" => 3
            ],
            [
                "employee_id" => 10,
                "service_id" => 2
            ],
            [
                "employee_id" => 11,
                "service_id" => 3
            ],
            [
                "employee_id" => 12,
                "service_id" => 4
            ],
            [
                "employee_id" => 13,
                "service_id" => 5
            ],
            [
                "employee_id" => 14,
                "service_id" => 6
            ],
            [
                "employee_id" => 15,
                "service_id" => 7
            ],
            [
                "employee_id" => 16,
                "service_id" => 1
            ],
            [
                "employee_id" => 17,
                "service_id" => 8
            ],
            [
                "employee_id" => 18,
                "service_id" => 9
            ],
            [
                "employee_id" => 19,
                "service_id" => 10
            ],
            [
                "employee_id" => 20,
                "service_id" => 11
            ],
            [
                "employee_id" => 21,
                "service_id" => 12
            ],
            [
                "employee_id" => 22,
                "service_id" => 13
            ],
            [
                "employee_id" => 23,
                "service_id" => 15
            ],
            [
                "employee_id" => 24,
                "service_id" => 14
            ],

        ];
        \App\Models\EmployeeService::insert($data);
    }
}
