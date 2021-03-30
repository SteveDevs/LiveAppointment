<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $setting = [
            [
                'company_name' => 'Example Company',
            ]
        ];

        Setting::insert($setting);
    }
}
