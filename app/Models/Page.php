<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'sub_title',
        'excerpt',
        'path',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pagesVideoContents()
    {
        return $this->belongsToMany(VideoContent::class);
    }

    public function pagesPagesections()
    {
        return $this->belongsToMany(Pagesection::class);
    }

    public function pagesContentSections()
    {
        return $this->belongsToMany(ContentSection::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
