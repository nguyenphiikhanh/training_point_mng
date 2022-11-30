<?php

namespace Database\Seeders;

use App\Http\Utils\RoleUtils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () {
            $user = [];
            //root user
            $root_user = [
                'first_name' => 'Dev',
                'last_name' => '_root',
                'username' => 'root',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => RoleUtils::ROLE_ADMIN,
                'semester' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $user[] = $root_user;

            // CB quan ly
            $cbql_user = [
                'first_name' => 'Pham Thu',
                'last_name' => 'Ha',
                'username' => 'cbql_ptha',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => RoleUtils::ROLE_QLSV,
                'semester' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $user[] = $cbql_user;

            //CV hoc tap
            $cvht_user = [
                'first_name' => 'Pham Thi',
                'last_name' => 'Anh Le',
                'username' => 'cvht_ptale',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => RoleUtils::ROLE_CVHT,
                'semester' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $user[] = $cvht_user;

            //can bo lop
            $cbl_user = [
                'first_name' => 'Nguyen Van',
                'last_name' => 'Huy',
                'username' => '695105060',
                'semester' => '69',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => RoleUtils::ROLE_CVHT,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $user[] = $cbl_user;

            //sinh vien
            for($i = 1; $i < 8; $i++){
                $username = '69510506'.$i;
                $user[] = [
                    'first_name' => 'Nguyen Van',
                    'last_name' => 'Huy',
                    'username' => $username,
                    'semester' => '69',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'role' => RoleUtils::ROLE_STUDENT,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            // Log::debug($user);
            DB::table('users')->insert($user);

        });
    }
}
