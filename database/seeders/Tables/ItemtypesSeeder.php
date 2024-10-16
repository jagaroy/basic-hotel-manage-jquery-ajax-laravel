<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemtypesSeeder extends Seeder
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
                'id' => 2,
                'item_type' => 'Raw Meterials',
                'item_type_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2022-04-29 05:06:39',
                'updated_at' => '2022-04-29 05:06:39',
            ],
            [
                'id' => 3,
                'item_type' => 'Processed',
                'item_type_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2022-04-29 05:06:52',
                'updated_at' => '2022-04-29 05:06:52',
            ]
        ];
        
        DB::table("itemtypes")->insert($dataTables);
    }
}