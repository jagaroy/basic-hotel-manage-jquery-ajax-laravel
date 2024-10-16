<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
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
                'item_id' => 1,
                'booking_id' => 1,
                'order_item_quantity' => 2,
                'order_cost' => 400,
                'order_time' => '9am',
                'order_status' => 'Active',
                'order_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2024-05-22 01:24:28',
                'updated_at' => '2024-05-22 01:24:28',
            ]
        ];
        
        DB::table("orders")->insert($dataTables);
    }
}