<?php

namespace Database\Seeders;

use App\Http\Utils\AppUtils;
use App\Http\Utils\RoleUtils;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::updateOrCreate(
            ['id' => 1],
            [
                'first_name' => 'Dev.Mr_',
                'last_name' => 'KhanhNP',
                'username' => 'root',
                'password' => Hash::make('password'), // password
                'role' => RoleUtils::ROLE_ADMIN,
            ]
        );
    }
}
