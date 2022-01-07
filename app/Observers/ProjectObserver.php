<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Str;

class ProjectObserver
{
    public function saving(Project $project)
    {
      if ($project->slug) {
        $project->slug = Str::slug($project->slug, '-');
      } else {
        $project->slug = Str::slug($project->name, '-');
      }

    }

    /**
     * Handle the project "updating" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updating(Project $project)
    {

      if ($project->slug) {
        $project->slug = Str::slug($project->slug, '-');
      } else {
        $project->slug = Str::slug($project->name, '-');
      } 
        
    }
}
