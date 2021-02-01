<?php

namespace Database\Seeders;

use App\Models\Receipts;
use App\Models\User;
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
        User::factory()
            ->count(3)
            ->has(Receipts::factory()->count(3))
            ->create();
    }
}
