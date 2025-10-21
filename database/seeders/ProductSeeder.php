<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Hozirgi userlar uchun productlar yaratish
        $users = User::all();

        if ($users->isEmpty()) {
            // Agar userlar yo'q bo'lsa, yangi user yaratish
            $user = User::factory()->create([
                'name' => 'Product Manager',
                'email' => 'manager@example.test',
            ]);
            $users = collect([$user]);
        }

        // Har bir user uchun 5-10 ta product
        foreach ($users as $user) {
            Product::factory()
                ->count(fake()->numberBetween(5, 10))
                ->create(['user_id' => $user->id]);
        }

        // Ba'zi productlarni out of stock qilish
        Product::factory()
            ->count(5)
            ->outOfStock()
            ->create(['user_id' => $users->random()->id]);

        // Ba'zi productlarni inactive qilish
        Product::factory()
            ->count(3)
            ->inactive()
            ->create(['user_id' => $users->random()->id]);
    }
}