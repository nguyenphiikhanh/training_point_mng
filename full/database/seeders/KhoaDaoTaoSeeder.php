<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhoaDaoTaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('khoa_dao_taos')->updateOrInsert(
            ['id' => 1],
            ['name' => 'K69'],
        );

        DB::table('khoa_dao_taos')->updateOrInsert(
            ['id' => 2],
            ['name' => 'K70'],
        );
        DB::table('khoa_dao_taos')->updateOrInsert(
            ['id' => 3],
            ['name' => 'K71'],
        );
        DB::table('khoa_dao_taos')->updateOrInsert(
            ['id' => 4],
            ['name' => 'K72'],
        );
    }
}
