<?php

use Illuminate\Database\Seeder;
use churchapp\Post;
use churchapp\Update;
use churchapp\Article;
use churchapp\Image;
use churchapp\Event;

class UpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $articles = Article::all();
        $images = Image::all();
        $events = Event::all();

        foreach($posts as $post){
            $owner_id = $post->postable_id;
            $created_at = $post->created_at;
            $update = Update::create(['creator_id' => $owner_id, 'created_at' => $created_at]);
            $post->updates()->save($update);
        }

        foreach($articles as $article){
            $owner_id = $article->created_by;
            $created_at = $article->created_at;
            $update = Update::create(['creator_id' => $owner_id, 'created_at' => $created_at]);
            $article->updates()->save($update);
        }

        foreach($images as $image){
            $created_at = $image->created_at;
            $update = Update::create(['creator_id' => 0, 'created_at' => $created_at]);
            $image->updates()->save($update);
        }

        foreach($events as $event){

            $created_at = $event->created_at;
            $update = Update::create(['creator_id' => 0, 'created_at' => $created_at]);
            $event->updates()->save($update);
        }
    }
}
