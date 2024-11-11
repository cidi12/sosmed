<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('posts')->insert([
            [
                'username' => 'Kucing',
                'email' => 'test@example.com',
                'post_title' => 'postingan 1',
                'post_content' => 'isi post 1',
                'comment' => json_encode(
                    [
                        ['name' => 'Laravel', 'text' => 'blue'],
                        ['name' => 'PHP', 'text' => 'green'],
                    ]
                )
            ],
            [
                'username' => 'Shiro',
                'email' => 'test@example2.com',
                'post_title' => 'postingan 2',
                'post_content' => 'isi post 2',
                'comment' => json_encode(
                    [
                        ['name' => 'ketupat', 'text' => 'blue'],
                        ['name' => 'kumba', 'text' => 'green'],
                    ]
                )

            ],
            [
                'username' => 'Kimbab',
                'email' => 'test@example3.com',
                'post_title' => 'postingan 3',
                'post_content' => 'isi post 3',
                'comment' => json_encode(
                    [
                        ['name' => 'tikus', 'text' => 'blue'],
                        ['name' => 'kuda', 'text' => 'green'],
                    ]
                )
            ]
        ]);
    }
}
