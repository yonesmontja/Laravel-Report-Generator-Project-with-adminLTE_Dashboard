<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\ReportType;
use App\Models\ReportUser;
use App\Models\ReportUserData;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reports
        Report::create([
            'name' => 'Medical Report'
        ]);
        Report::create([
            'name' => 'Computer Report'
        ]);
        Report::create([
            'name' => 'Gaming Report'
        ]);
        Report::create([
            'name' => 'Laravel Report'
        ]);
        Report::create([
            'name' => 'WordPress Report'
        ]);


        // Report Types
        ReportType::create([
            'report_id' => 1,
            'name'      => 'Doctor Name'
        ]);
        ReportType::create([
            'report_id' => 1,
            'name'      => 'Medical Degree'
        ]);
        ReportType::create([
            'report_id' => 1,
            'name'      => 'Medical Specialization'
        ]);
        ReportType::create([
            'report_id' => 2,
            'name'      => 'Student Name'
        ]);
        ReportType::create([
            'report_id' => 2,
            'name'      => 'Gender'
        ]);
        ReportType::create([
            'report_id' => 2,
            'name'      => 'Graduation'
        ]);
        ReportType::create([
            'report_id' => 3,
            'name'      => 'Player Name'
        ]);
        ReportType::create([
            'report_id' => 3,
            'name'      => 'Game Name'
        ]);
        ReportType::create([
            'report_id' => 3,
            'name'      => 'Player Level'
        ]);
        ReportType::create([
            'report_id' => 4,
            'name'      => 'Team Name'
        ]);
        ReportType::create([
            'report_id' => 4,
            'name'     => 'Projects'
        ]);


        // Users
        User::create([
            'name'     => 'ZeeBoy',
            'email'    => 'zeeboy@email.com',
            'password' => 'admin123'
        ]);
        User::create([
            'name'     => 'Haroon',
            'email'    => 'haroon@email.com',
            'password' => 'admin123'
        ]);


        // Report Users
        ReportUser::create([
            'user_id'   => 2,
            'report_id' => 2
        ]);
        ReportUser::create([
            'user_id'   => 1,
            'report_id' => 3
        ]);
        ReportUser::create([
            'user_id'   => 2,
            'report_id' => 1
        ]);


        // Report User Data
        ReportUserData::create([
            'report_user_id' => 1,
            'report_type_id' => 4,
            'value'          => 'Haroon Mughal'
        ]);
        ReportUserData::create([
            'report_user_id' => 1,
            'report_type_id' => 5,
            'value'          => 'Male'
        ]);
        ReportUserData::create([
            'report_user_id' => 1,
            'report_type_id' => 6,
            'value'          => 'BSCS'
        ]);
        ReportUserData::create([
            'report_user_id' => 2,
            'report_type_id' => 7,
            'value'          => 'ZeeBoy'
        ]);
        ReportUserData::create([
            'report_user_id' => 2,
            'report_type_id' => 8,
            'value'          => 'Tekken 7'
        ]);
        ReportUserData::create([
            'report_user_id' => 2,
            'report_type_id' => 9,
            'value'          => 'Expert'
        ]);
    }
}
