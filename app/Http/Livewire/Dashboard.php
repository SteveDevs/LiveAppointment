<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Appointment;
use Carbon\Carbon;

final class Dashboard extends Component
{
    public $currentAppointments;
    public $todayAppointments;
    public $recentAppointments;

    public function mount(): void
    {

        $this->currentAppointments = Appointment::query()
        ->whereDate('start_time', '<=', Carbon::now()->format('Y-m-d H:i:s'))
        ->whereDate('finish_time', '>=', Carbon::now()->format('Y-m-d H:i:s'))
        ->get();

        $this->todayAppointments = Appointment::query()
        ->whereDate('start_time', '<', Carbon::now()->endOfDay()->format('Y-m-d H:i:s'))
        ->whereDate('finish_time', '>', Carbon::now()->startOfDay()->format('Y-m-d H:i:s'))
        ->get();

        $this->recentAppointments = Appointment::select('employees.name as employee_name', 'clients.name as client_name', 'price', 'finish_time')
        ->join('clients', 'appointments.client_id', '=', 'clients.id')
        ->join('employees', 'appointments.employee_id', '=', 'employees.id')
        ->whereBetween('finish_time', [Carbon::now()->subDays(3)->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s')])
        ->orderBy('start_time', 'desc')
        ->get();
        
    }

    public function render(): View
    {
        return view('dashboard')
            ->layout('components.layouts.auth', [
                'title' => __('Dashboard')
            ]);
    }
}
