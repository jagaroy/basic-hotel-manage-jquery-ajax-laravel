<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\Database\Seeders\Tables\BookingsSeeder::class);
        $this->call(\Database\Seeders\Tables\CustomersSeeder::class);
        $this->call(\Database\Seeders\Tables\ExpensesSeeder::class);
        $this->call(\Database\Seeders\Tables\ItemsSeeder::class);
        $this->call(\Database\Seeders\Tables\ItemtypesSeeder::class);
        $this->call(\Database\Seeders\Tables\OrdersSeeder::class);
        $this->call(\Database\Seeders\Tables\PasswordResetsSeeder::class);
        $this->call(\Database\Seeders\Tables\PaymentsSeeder::class);
        $this->call(\Database\Seeders\Tables\RemindersSeeder::class);
        $this->call(\Database\Seeders\Tables\RolesSeeder::class);
        $this->call(\Database\Seeders\Tables\RoomsSeeder::class);
        $this->call(\Database\Seeders\Tables\RoomtypesSeeder::class);
        $this->call(\Database\Seeders\Tables\UsersSeeder::class);
    }
}
