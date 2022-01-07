<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const COMMENT_STATUS_SELECT = [
        '0' => 'Closed',
        '1' => 'Open',
    ];

    public $table = 'posts';

    protected $hidden = [
        'post_password',
    ];

    protected $appends = [
        'featured_image',
        'attachments',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'title',
        'body_text',
        'excerpt',
        'meta_title',
        'meta_description',
        'facebook_title',
        'facebook_desc',
        'twitter_post_description',
        'twitter_post_title',
        'published',
        'slug',
        'contributor',
        'contributor_link',
        'contributor_2',
        'contributor_2_link',
        'menu_order',
        'comment_status',
        'post_password',
        'comment_count',
        'ping_status',
        'read_time',
        'video_url',
        'author_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopePublished($query)
	{
		return $query->where('published', 1);
	}
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function postsContentSections()
    {
        return $this->belongsToMany(ContentSection::class)->orderBy('order', 'ASC');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
