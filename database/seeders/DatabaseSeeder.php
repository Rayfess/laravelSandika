<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * skema untuk mengeksekusi si factory atau data palsu
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([UserSeeder::class, KategoriSeeder::class]);
        Post::factory(50)->recycle([
            Kategori::all(),
            User::all(),
        ])->create();
    }
}
