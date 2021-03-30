<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(1)->roles()->sync(1);

        $data = [
            [
                'user_id' => 2,
                'role_id' => 2
            ],
            [
                'user_id' => 3,
                'role_id' => 3
            ],
            [
                'user_id' => 4,
                'role_id' => 4
            ]
        ];
    }
}
