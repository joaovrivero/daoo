<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Activity;
use App\Models\Message;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->count(10)->create();

        Activity::factory()->count(20)->create([
            'user_id' => User::all()->random()->id,
        ]);

        Message::factory()->count(50)->create([
            'sender_id' => User::all()->random()->id,
            'recipient_id' => User::all()->random()->id,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
