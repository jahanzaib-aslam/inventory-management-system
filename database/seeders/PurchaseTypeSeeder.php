<?php

namespace Database\Seeders;

use App\Models\PurchaseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PurchaseType::create([
            'name'      =>      'LOCAL'
        ]);
    }
}
