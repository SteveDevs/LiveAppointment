<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
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
                "name" => "Mental health care",
                "price" => "150"
            ],
            [
                "name" => "Dental care",
                "price" => "150"
            ],
            [
                "name" => "Laboratory and diagnostic care",
                "price" => "120"
            ],
            [
                "name" => "Substance abuse treatment",
                "price" => "400"
            ],
            [
                "name" => "Preventative care",
                "price" => "150"
            ],
            [
                "name" => "Physical and occupational therapy",
                "price" => "150"
            ],
            [
                "name" => "Nutritional support",
                "price" => "110"
            ],
            [
                "name" => "Pharmaceutical care",
                "price" => "100"
            ],
            [
                "name" => "Transportation",
                "price" => "150"
            ],
            [
                "name" => "Prenatal care",
                "price" => "160"
            ],
            [
                "name" => "Councelling",
                "price" => "150"
            ],
            [
                "name" => "Chiropractic care",
                "price" => "250"
            ],
            [
                "name" => "GP",
                "price" => "160"
            ],
            [
                "name" => "Psychiatry",
                "price" => "350"
            ],
            [
                "name" => "Psychologist",
                "price" => "110"
            ]
        ];
        \App\Models\Service::insert($data);
    }
}
