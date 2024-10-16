<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
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
                'room_type_id' => 1,
                'room_number' => 100,
                'room_description' => 'Luxury Room 100',
                'room_status' => 'Active',
                'room_remarks' => 'Luxury Room 100...',
                'authored_by' => 1,
                'created_at' => '2024-05-22 01:17:47',
                'updated_at' => '2024-05-22 01:19:21',
            ]
        ];
        
        DB::table("rooms")->insert($dataTables);
    }
}