<?php

namespace Database\Seeders;

use App\Models\Khoa;
use Illuminate\Database\Seeder;

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
        $facuties_seeder = [
            ['ten_khoa' => 'Hoá học'],
            ['ten_khoa' => 'Toán học'],
            ['ten_khoa' => 'Lịch sử'],
            ['ten_khoa' => 'Công nghệ'],
            ['ten_khoa' => 'Vật lý'],
            ['ten_khoa' => 'Sinh học'],
            ['ten_khoa' => 'Giáo dục Quốc phòng'],
            ['ten_khoa' => 'Giáo dục thể chất'],
            ['ten_khoa' => 'Giáo dục đặc biệt'],
            ['ten_khoa' => 'Tâm lý học'],
            ['ten_khoa' => 'Công nghệ thông tin'],
        ];

        foreach($facuties_seeder as $faculty){
            Khoa::create($faculty);
        }
    }
}
