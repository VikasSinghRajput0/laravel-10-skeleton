<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => '1',
                'name' => 'Master',
                'email' => 'masteradmin@gmail.com',
                'password' => 'secret',
                'role_id' => 1,
                'phone_number' => '9876543210',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'name' => 'GroupAdmin',
                'email' => 'groupadmin@gmail.com',
                'password' => 'secret',
                'role_id' => 2,
                'phone_number' => '9876543210',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'name' => 'SiteAdmin',
                'email' => 'siteadmin@gmail.com',
                'password' => 'secret',
                'role_id' => 3,
                'phone_number' => '9876543210',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'name' => 'SaleManager',
                'email' => 'salemanager@gmail.com',
                'password' => 'secret',
                'role_id' => 4,
                'phone_number' => '9876543210',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [

                'id' => '5',
                'name' => 'FinanceManager',
                'email' => 'finance@gamil.com',
                'password' => 'secret',
                'role_id' => 5,
                'phone_number' => '9876543210',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [

                'id' => '6',
                'name' => 'Customer',
                'email' => 'customer@gamil.com',
                'password' => 'secret',
                'role_id' => 6,
                'phone_number' => '9876543210',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];
        foreach ($users as $user) {
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
