<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Http\Traits\ApiJsonExternal;
use App\Models\Post;

class PostSeed extends Seeder
{

    use ApiJsonExternal;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = $this->getPostsData();

        foreach ($posts as $post) {
            Post::create([
                'user_id' => $post['userId'],
                'title' => $post['title'],
                'body' => $post['body']
            ]);
        }
    }
}
