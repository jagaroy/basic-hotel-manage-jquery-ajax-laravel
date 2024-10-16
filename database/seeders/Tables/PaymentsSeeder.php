<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
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
                'booking_id' => 1,
                'payment_amount' => 200,
                'payment_method' => 'Cash',
                'payment_time' => '10:30am',
                'payment_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2024-05-22 01:25:12',
                'updated_at' => '2024-05-22 01:25:12',
            ]
        ];
        
        DB::table("payments")->insert($dataTables);
    }
}