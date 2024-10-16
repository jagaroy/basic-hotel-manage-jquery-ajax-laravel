<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Command :
         * artisan seed:generate --mode=table --all-tables
         *
         */

        $dataTables = [
            [
                'id' => 1,
                'type' => 'superadmin',
                'role_id' => NULL,
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$em529oOy0nRUWmgq5Z5lTe64l03LmM6K1RuFchrpBmZhwvvZ7/a46',
                'remember_token' => NULL,
                'phone' => 1234567890,
                'image' => '/upload/profiles/User-1716534463.png',
                'status' => 'Active',
                'created_at' => '2021-10-28 01:57:36',
                'updated_at' => '2024-05-24 13:07:43',
            ],
            [
                'id' => 496,
                'type' => 'user',
                'role_id' => 5,
                'name' => 'Ik6W1HMuMt',
                'email' => 'ik6W1HMuMt@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$dbvUEVxJKwyES1vj84F7quViyQV3vP4eZAdhK1zGl1dpftCzWO4T.',
                'remember_token' => NULL,
                'phone' => 496,
                'image' => '/upload/profiles/6Lj22iGX8Y-1648324434.png',
                'status' => 'Active',
                'created_at' => '2021-10-28 01:58:16',
                'updated_at' => '2022-04-01 11:41:28',
            ],
            [
                'id' => 504,
                'type' => 'user',
                'role_id' => 4,
                'name' => 'Badol',
                'email' => 'badol@badol.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$C0fEpnMni1I5rIrVUFfJt.dn6nFJm96i3iPfUdR9PVWt8h4wm7VUW',
                'remember_token' => NULL,
                'phone' => 88999999999,
                'image' => '/upload/profiles/User-1716319951.png',
                'status' => 'Active',
                'created_at' => '2022-08-15 16:39:25',
                'updated_at' => '2024-05-22 01:32:31',
            ]
        ];
        
        DB::table("users")->insert($dataTables);
    }
}