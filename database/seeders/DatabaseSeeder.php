<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([
            [
                'name' => 'Trường Công nghệ thông tin & Truyền thông',
            ],
            [
                'name' => 'Trường Kinh tế',
            ],
            [
                'name' => 'Trường Nông nghiệp',
            ],
            [
                'name' => 'Trường Bách khoa',
            ],
            [
                'name' => 'Khoa Giáo dục thể chất',
            ],
            [
                'name' => 'Khoa Khoa học Chính trị',
            ],
            [
                'name' => 'Khoa Thuỷ sản',
            ],
            [
                'name' => 'Khoa Môi trường',
            ],
        ]);

        DB::table('majors')->insert([
            [
                'name' => 'Công nghệ thông tin',
                'college_id' => 1,
            ],
            [
                'name' => 'Tin học ứng dụng',
                'college_id' => 1,
            ],
            [
                'name' => 'Hệ thống thông tin',
                'college_id' => 1,
            ],
            [
                'name' => 'Kĩ thuật phần mềm',
                'college_id' => 1,
            ],
            [
                'name' => 'Khoa học máy tính',
                'college_id' => 1,
            ],
        ]);
    }
}
