<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $medicalText = [];
        $medicalText[] = "presented at 22 weeks with prem labour and bulging membranes managed conservatively and discharged
        did receive antenatal steroids for this period";
        
        $medicalText[] = "No father involved
        mother arrived intoxicated needs social services";

        $medicalText[] = "Orientation normal LA prominent Massive PDA 3.2 mm left to right PFO left to right MR but no TR";

        $medicalText[] = "Prem and presume abruptio related currently asymptomatic will require blood transfusion";

        $medicalText[] = "Mottled skin colour with poor perfusion
        Abd distended discoloured firm
        CVS s1 S2 normal wide pulse pressure
        CNS apathetic and unwell
        Resp tachypnoea but clear";

        $medicalText[] = "presented at 22 weeks with prem labour and bulging membranes managed conservatively and discharged
        did receive antenatal steroids for this period";

        $medicalText[] = "Hgt unstable overnight spiked to 11 g/dl
        FFP administered
        Staff indicated increasing WOB but still 21% oxygen associated with increasing fleeting brady and desats
        Colour also poor , pale complexion";

        $medicalText[] = "Resp WOB increased CXR worsening HMD , repeat curosurf administration with 2/0 tube uneventful little lazy to breath post
        CVS stable BP but tachycardia post Atropine still S1S2 normal
        Abd UVC in situ , no liver no spleen
        CNS font soft active and responsive
        ";

        $medicalText[] = "Resp RR <60 weaning flo no issues
        Abd tolerating small feds building
        CVS no murmru normal heart sounds
        CNS apathy only";

        $medicalText[] = "Asymmetrical HMD on chest xray
        Curosurf administered on the DOB
        18/02/2021 Second dose of Curosurf given for increasing WOB (Silverman Anderson score) , INSURE";

        $medicalText[] = "Replaced UVC Short line confirmed on AXR Umbilcal arteries present but failed attempts at Vergelegen visible";

        $medicalText[] = "HMD no surfactant needed ";

        $prices = [
            150, 170, 180, 190, 200, 210, 220, 230, 240, 250, 260, 270, 300, 350, 340, 120, 330, 360, 370, 380, 390
        ];

        $start_time = now()->addHours(rand(1, 100));

        return [
            'client_id' => \App\Models\Client::inRandomOrder()->first()->id,
            'employee_id' => \App\Models\Employee::inRandomOrder()->first()->id,
            'start_time' => $start_time->format('Y-m-d H') . ':00',
            'finish_time' => $start_time->addHours(rand(1, 2))->format('Y-m-d H') . ':00',
            'comments' => $medicalText[array_rand($medicalText)],
            'price' => $prices[array_rand($prices)]
        ];
    }
}
