<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomtypesSeeder extends Seeder
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
                'room_type' => 'Luxury',
                'room_type_image' => '/upload/roomtypes/room_type_image-1716318530.jpg',
                'room_type_desc' => 'Luxury Room',
                'room_type_status' => 'Active',
                'room_type_remarks' => 'Luxury Room in Hotel',
                'authored_by' => 1,
                'created_at' => '2024-05-22 01:08:50',
                'updated_at' => '2024-05-22 01:08:50',
            ]
        ];
        
        DB::table("roomtypes")->insert($dataTables);
    }
}