<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles =['admin','author','editor','user'];
            foreach ($roles as $role){
                Role::factory()->create([
                    'name'=> $role,
                    'uuid'=>Str::uuid()->toString()
                ]);
            }
    }
}
