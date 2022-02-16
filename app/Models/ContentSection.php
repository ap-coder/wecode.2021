<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentSection extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const LOCATION_SELECT = [
        'page_top'       => 'CS: Page Top',
        'content_top'    => 'CS: Content Top',
        'content_bottom' => 'CS: Content Bottom',
        'page_bottom'    => 'CS: Page Bottom',
    ];

    public $table = 'content_sections';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'section_title',
        'order',
        'section',
        'location',
        'published',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function threads()
    {
        return $this->belongsToMany(Thread::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function assign_contentPages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function assign_posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function assign_threads()
    {
        return $this->belongsToMany(Thread::class);
    }

    public function assign_projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
