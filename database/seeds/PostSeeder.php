<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            Post::create([
                'user_id' => 1,
                'title' => '测试标题-' . $i,
                'content' => '测试内容-' . $i,
            ]);
        }
    }
}
