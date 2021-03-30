<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Appointment;
use DB;

class AppointmentRepository extends Appointment
{
    public function checkAvailability(string $startTime, string $finishTime, $employeeID, $clientID, $id = null) : bool
    {   
        
        $employeeAppointments = Appointment::query()
            ->whereDate('start_time', '<', $finishTime)
            ->whereDate('finish_time', '<', $finishTime)
            ->where('employee_id', $employeeID)
            ->get();


        $employeeAppointmentsCount = count($employeeAppointments);
        if($employeeAppointmentsCount > 0){
            if(isset($id) && $employeeAppointmentsCount > 1){
                return false;
            }else if(isset($id)){
                return true;
            }
            return false;
        } 
        /*
            SELECT * FROM DateTable
WHERE DATEDIFF('2013-07-14',dateFROM)>=0
AND DATEDIFF('2013-07-14', dateTO) <= 0

WHERE q1.endtime > '8:00:00' AND q1.starttime < '9:40:00'
        */
        $clientAppointments = Appointment::query()
            ->whereDate('start_time', '<', $finishTime)
            ->whereDate('finish_time', '>', $startTime)
            ->where('client_id', $clientID)
            ->get();
        $clientAppointmentsCount = count($clientAppointments);
        if($clientAppointmentsCount > 0){
            if(isset($id) && $clientAppointmentsCount > 1){
                return false;
            }else if(isset($id)){
                return true;
            }
            return false;
        } 

        return true;
    }

    public function getCurent()
    {   
        return Appointment::query()
            ->whereDate('start_time', '>=', $startTime)
            ->whereDate('finish_time', '<=', $finishTime)
            ->get();
    }

    public function getToday()
    {   
        return Appointment::query()
            ->whereDate('start_time', '>=', $startTime)
            ->whereDate('finish_time', '<=', $finishTime)
            ->get();
    }
}
