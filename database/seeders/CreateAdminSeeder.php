<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('username', 'admin')->first();
        if(!$admin){
            User::create([
                'name'      =>      'admin',
                'email'     =>      'admin@mythical.com',
                'username'  =>      'admin',
                'password'  =>      '11111111'
            ]);
        }
    }
}
