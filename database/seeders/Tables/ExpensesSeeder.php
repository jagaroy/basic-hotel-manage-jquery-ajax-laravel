<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpensesSeeder extends Seeder
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
                'user_id' => 55,
                'expense_type' => 'fhfh',
                'expense_description' => 'jhfh',
                'expense_amount' => 258,
                'expense_time' => 7878,
                'expense_remarks' => 'cxcvsdf',
                'authored_by' => 1,
                'created_at' => '2022-05-11 21:41:05',
                'updated_at' => '2022-05-11 21:41:05',
            ]
        ];
        
        DB::table("expenses")->insert($dataTables);
    }
}