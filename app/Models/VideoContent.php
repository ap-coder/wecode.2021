<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VideoContent extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const VIDEO_TYPE_RADIO = [
        'youtube' => 'YouTube',
        'vimeo'   => 'Vimeo',
        'custom'  => 'Custom',
    ];

    public $table = 'video_contents';

    protected $appends = [
        'placeholder',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'public_everywhere',
        'title',
        'alternate_title',
        'content_area',
        'youtube',
        'vimeo',
        'other_video',
        'meta_title',
        'meta_description',
        'fbt',
        'fbd',
        'twt',
        'twd',
        'notes_area',
        'video_type',
        'thread_id',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPlaceholderAttribute()
    {
        $file = $this->getMedia('placeholder')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
