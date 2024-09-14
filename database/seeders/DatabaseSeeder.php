<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => config('first-deploy.admin.email'),
            'email' => config('first-deploy.admin.email'),
            'password' => config('first-deploy.admin.password')
        ]);

        //TODO Сделать модель для токена
        DB::table('internal_api_users')->insert([
            'api_token' => config('first-deploy.internal_api_token'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Company::factory()->count(20)->create();
    }
}
