<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('posts')->insert([
        //     'title' => 'Belajar Model Dengan Laravel',
        //     'slug' => ' belajar-model-dengan-laravel',
        //     'content' => 'Belajar Laravel itu menyenangkan dan seru',
        //     'draft' => 0
        // ]);

        // Call Factory
        Post::factory()->count(10)->create();
    }
}
