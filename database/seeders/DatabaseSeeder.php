<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Report;
use App\Models\ReportType;
use App\Models\ReportUser;
use App\Models\ReportUserData;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
            'name' => 'EO Report'
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
            'name'      => 'Projects'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Company Name'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Logo URL'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Address 1'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Address 2'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Phone'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Fax'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Website'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Project Reference Number'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'PO NO'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'PO Date'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Vendor'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Vendor Address'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Delivery Date'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Delivery Address'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Contact Person'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Buyer Contact Person'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Phone 1'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Phone 2'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Email 1'
        ]);
        ReportType::create([
            'report_id' => 5,
            'name'      => 'Email 2'
        ]);


        // Users
        User::create([
            'name'     => 'ZeeBoy',
            'email'    => 'zeeboy@email.com',
            'password' => '$2y$10$lhB.bh9x2Yl95awY6DqQfuwS1/eAEV2KzsRHcVKBxc1QlEt1bZd3m'
            // 'password' => 'admin123'
        ]);
        User::create([
            'name'     => 'Haroon',
            'email'    => 'haroon@email.com',
            'password' => '$2y$10$lhB.bh9x2Yl95awY6DqQfuwS1/eAEV2KzsRHcVKBxc1QlEt1bZd3m'
        ]);
        User::create([
            'name'     => 'Haris',
            'email'    => 'haris@email.com',
            'password' => '$2y$10$lhB.bh9x2Yl95awY6DqQfuwS1/eAEV2KzsRHcVKBxc1QlEt1bZd3m'
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
            'user_id'   => 3,
            'report_id' => 3
        ]);
        ReportUser::create([
            'user_id'   => 2,
            'report_id' => 5
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
        ReportUserData::create([
            'report_user_id' => 3,
            'report_type_id' => 7,
            'value'          => 'Haris'
        ]);
        ReportUserData::create([
            'report_user_id' => 3,
            'report_type_id' => 8,
            'value'          => 'PUBG Mobile'
        ]);
        ReportUserData::create([
            'report_user_id' => 3,
            'report_type_id' => 9,
            'value'          => 'Ace'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 12,
            'value'          => 'Mughals eWeb'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 13,
            'value'          => 'https://picsum.photos/70'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 14,
            'value'          => 'Glenn Farms Dr #Y West'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 15,
            'value'          => 'Clarence St Pontiac, Michigan'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 16,
            'value'          => '678-752-0537'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 17,
            'value'          => '222 8888 121'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 18,
            'value'          => 'mughalseweb.com'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 19,
            'value'          => '1115460'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 20,
            'value'          => '1'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 21,
            'value'          => '28-02-2022'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 22,
            'value'          => 'eo_portal'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 23,
            'value'          => '28-02-2022'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 24,
            'value'          => 'Clarence St Pontiac, Michigan'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 25,
            'value'          => 'Glenn Farms Dr #Y West'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 26,
            'value'          => 'Haris Ali Barkat'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 27,
            'value'          => 'Haroon Mughal'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 28,
            'value'          => '678-752-0537'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 29,
            'value'          => '650-619-1980'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 30,
            'value'          => 'eo_help@eo.com'
        ]);
        ReportUserData::create([
            'report_user_id' => 4,
            'report_type_id' => 31,
            'value'          => 'ecommerceoutset@gmail.com'
        ]);
    }
}
