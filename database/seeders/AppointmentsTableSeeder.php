<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Service;


class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointments = \App\Models\Appointment::factory()->count(100)->create();
        foreach($appointments as $appointment){
            $employee = \App\Models\Employee::find($appointment->employee_id);
            $services = $employee->services()->get()->map(function (Service $model) {
                return $model->id;
            })->toArray();

            if(count($services) > 1){
                //Choose a variable amount of services for appointment
                $splice = rand ( -1 , count($services));
                array_splice($services, $splice);
            }
            
            $appointment->services()->sync($services);
        }
    }
}
