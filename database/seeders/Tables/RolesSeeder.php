<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
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
                'id' => 4,
                'name' => 'Modarator',
                'description' => 'Description',
                'authored_by' => 1,
                'created_at' => '2022-04-29 04:56:43',
                'updated_at' => '2022-08-15 16:40:08',
            ],
            [
                'id' => 5,
                'name' => 'Receptionist',
                'description' => 'Description',
                'authored_by' => 1,
                'created_at' => '2022-04-29 04:57:30',
                'updated_at' => '2022-04-29 04:57:30',
            ]
        ];
        
        DB::table("roles")->insert($dataTables);
    }
}