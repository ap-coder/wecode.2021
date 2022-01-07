<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function saving(Post $post)
    {
      if ($post->slug) {
        $post->slug = Str::slug($post->slug, '-');
      } else {
        $post->slug = Str::slug($post->title, '-');
      }

    }

    /**
     * Handle the post "updating" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {

      if ($post->slug) {
        $post->slug = Str::slug($post->slug, '-');
      } else {
        $post->slug = Str::slug($post->title, '-');
      } 
        
    }
}
