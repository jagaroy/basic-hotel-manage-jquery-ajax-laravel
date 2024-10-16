<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsSeeder extends Seeder
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
                'room_id' => 1,
                'customer_id' => 1,
                'booking_date' => '2024-05-22',
                'check_in_time' => '8am',
                'check_out_time' => '10pm',
                'booking_status' => 'Active',
                'booking_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2024-05-22 01:22:22',
                'updated_at' => '2024-05-22 01:22:22',
            ]
        ];
        
        DB::table("bookings")->insert($dataTables);
    }
}