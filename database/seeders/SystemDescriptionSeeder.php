<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemDescription;

class SystemDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemDescription::factory()
            ->count(5)
            ->create();
    }
}
