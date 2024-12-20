<?php

namespace Database\Seeders;

use App\Models\Issue;
use Database\Factories\IssueFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Issue::factory(50)->create();
    }
}
