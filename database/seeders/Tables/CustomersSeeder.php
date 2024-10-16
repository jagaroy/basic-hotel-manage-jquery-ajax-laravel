<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
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
                'customer_name' => 'Sumon',
                'customer_phone' => 1222333444,
                'customer_email' => 's@s.c',
                'customer_address' => 'USA',
                'customer_gender' => 'Male',
                'customer_photo' => '/upload/customers/customer_photo-1716319198.png',
                'customer_status' => 'Active',
                'customer_remarks' => 'Remarks',
                'authored_by' => 1,
                'created_at' => '2022-04-23 11:05:53',
                'updated_at' => '2024-05-22 01:21:26',
            ]
        ];
        
        DB::table("customers")->insert($dataTables);
    }
}