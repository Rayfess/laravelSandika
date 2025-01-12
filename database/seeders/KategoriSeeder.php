<?php


namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            "name" => "Programing",
            "slug" => "programing",
            "color" => "red",
        ]);

        Kategori::create([
            "name" => "Networking",
            "slug" => "networking",
            "color" => "green",
        ]);

        Kategori::create([
            "name" => "Multimedia",
            "slug" => "multimedia",
            "color" => "blue",
        ]);
    }
}
