<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Database\Seeders\TaskStatusSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    use HasFactory;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            TaskStatusSeeder::class,
            UserSeeder::class,

        ]);
        Task::factory()
            ->count(30)
            ->create();
    }
}
