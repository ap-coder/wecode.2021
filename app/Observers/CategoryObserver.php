<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function saving(Category $category)
    {
      if ($category->slug) {
        $category->slug = Str::slug($category->slug, '-');
      } else {
        $category->slug = Str::slug($category->name, '-');
      }

    }

    /**
     * Handle the category "updating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {

      if ($category->slug) {
        $category->slug = Str::slug($category->slug, '-');
      } else {
        $category->slug = Str::slug($category->name, '-');
      } 
        
    }
}
