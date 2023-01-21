<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'theme' => 'life and death'
            ],
            [
                'theme' => 'beauty'
            ],
            [
                'theme' => 'loyalty'
            ],
            [
                'theme' => 'family'
            ],
            [
                'theme' => 'justice'
            ],
        ];

        foreach ($comments as $key=> $value){
            Comment::created($value);
        }

    }
}
