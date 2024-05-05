<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(10)->create();

        Admin::factory()->create([
            'name' => 'Dian Utari',
            'email' => 'dianutari989@gmail.com',
            'level' => "Super Admin",
            'password' => bcrypt(12341234),
        ]);

        Admin::factory()->create([
            'name' => 'Rico Pahlefi',
            'email' => 'ricopahlefi22@gmail.com',
            'level' => "Super Admin",
            'password' => bcrypt(12341234),
        ]);
    }
}
