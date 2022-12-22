<?php

namespace Database\Seeders;

use App\Models\Khoa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('khoas')->updateOrInsert(
            ['id' => 1],
            ['ten_khoa' => 'Công nghệ thông tin'],
        );

        DB::table('khoas')->updateOrInsert(
            ['id' => 2],
            ['ten_khoa' => 'Toán học'],
        );

        DB::table('khoas')->updateOrInsert(
            ['id' => 3],
            ['ten_khoa' => 'Lịch sử'],
        );

        DB::table('khoas')->updateOrInsert(
            ['id' => 4],
            ['ten_khoa' => 'Công nghệ'],
        );

        DB::table('khoas')->updateOrInsert(
            ['id' => 5],
            ['ten_khoa' => 'Vật lý'],
        );

        DB::table('khoas')->updateOrInsert(
            ['id' => 6],
            ['ten_khoa' => 'Sinh học'],
        );

        DB::table('khoas')->updateOrInsert(
            ['id' => 7],
            ['ten_khoa' => 'Giáo dục Quốc phòng'],
        );

    }
}
