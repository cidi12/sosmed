<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Credential;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Post::insert([
        //     [
        //         'username' => 'Kucing',
        //         'email' => 'test@example.com',
        //         'post_title' => 'postingan 1',
        //         'post_content' => 'isi post 1',
              

        //     ],

        //     [
        //         'username' => 'Shiro',
        //         'email' => 'test@example2.com',
        //         'post_title' => 'postingan 2',
        //         'post_content' => 'isi post 2',
                
              

        //     ],
        //     [
        //         'username' => 'Kimbab',
        //         'email' => 'test@example3.com',
        //         'post_title' => 'postingan 3',
        //         'post_content' => 'isi post 3',
              

        //     ]
        // ]);
        Credential::create(
            [

                
                    'username' => 'Cerpelai',
                    'email' => 'qwe@qwe.com',
                    'password' =>   Hash::make('qwe'),
                
            ]

        );
    }
}
