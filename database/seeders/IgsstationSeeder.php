<?php

namespace Database\Seeders;

use App\Models\Igsstation;
use Illuminate\Database\Seeder;

class IgsstationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Igsstation::factory()
            ->count(5)
            ->create();
    }
}
