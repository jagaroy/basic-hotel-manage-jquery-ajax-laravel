<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
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
                'item_type' => 3,
                'item_name' => 'Burger',
                'item_cost' => 300,
                'item_details' => 'Burger',
                'item_status' => 'Active',
                'item_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2022-04-29 05:11:29',
                'updated_at' => '2022-04-29 05:11:29',
            ]
        ];
        
        DB::table("items")->insert($dataTables);
    }
}