<?php

namespace Database\Seeders;

use App\Models\Corsstation;
use Illuminate\Database\Seeder;

class CorsstationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Corsstation::factory()
            ->count(5)
            ->create();
    }
}
