<?php

namespace Database\Seeders;

use App\Models\Computer;
use Database\Factories\ComputerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Computer::factory(50)->create();
    }
}
