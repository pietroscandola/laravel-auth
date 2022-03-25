<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $post = new Post();
            $post->title = $faker->text();
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(360, 360);
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
