<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use InteractsWithMedia;

    public $table = 'pages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'photo',
        'attachments',
        'featured_image',
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
        
        'published',
        'meta_title',
        'meta_description',
        'facebook_title',
        'facebook_description',
        'twitter_title',
        'twitter_description',
        'use_textonly_header',
        'show_title',
        'show_tagline',
        'show_featured_content',
        'featured_image_content',
        'use_svg_header',
        'use_featured_image_header',
        'svg_masthead',
        'title_style',
        'tagline_style',
        'fi_content_style',
        'add_to_sitemap',
        'custom_css',
    ];

    public const TITLE_STYLE_SELECT = [
        'text-primary bg-light'   => 'Primary',
        'text-secondary bg-dark'  => 'Secondary',
        'text-light bg-dark'      => 'Light',
        'text-dark  bg-light'        => 'Dark',
        'text-primary bg-dark p-2'    => 'Primary BG Dark',
        'text-primary bg-light p-2'   => 'Primary BG Light',
        'text-secondary bg-dark p-2'  => 'Secondary BG Dark',
        'text-secondary bg-light p-2' => 'Secondary BG Light',
        'text-light bg-dark p-2'      => 'Light BG Dark',
        'text-dark bg-light p-2'      => 'Dark BG Light',
    ];
    
    public const TAGLINE_STYLE_SELECT = [
        'text-primary bg-light'   => 'Primary',
        'text-secondary bg-dark'  => 'Secondary',
        'text-light bg-dark'      => 'Light',
        'text-dark bg-light'      => 'Dark',
        'text-primary bg-dark p-2'    => 'Primary BG Dark',
        'text-primary bg-light p-2'   => 'Primary BG Light',
        'text-secondary bg-dark p-2'  => 'Secondary BG Dark',
        'text-secondary bg-light p-2' => 'Secondary BG Light',
        'text-light bg-dark p-2'      => 'Light BG Dark',
        'text-dark bg-light p-2'      => 'Dark BG Light',
    ];

    public const FI_CONTENT_STYLE_SELECT = [
        'text-primary bg-light'   => 'Primary',
        'text-secondary bg-dark'  => 'Secondary',
        'text-light  bg-dark'     => 'Light',
        'text-dark bg-light'      => 'Dark',
        'text-primary bg-dark p-2'    => 'Primary BG Dark',
        'text-primary bg-light p-2'   => 'Primary BG Light',
        'text-secondary bg-dark p-2'  => 'Secondary BG Dark',
        'text-secondary bg-light p-2' => 'Secondary BG Light',
        'text-light bg-dark p-2'      => 'Light BG Dark',
        'text-dark bg-light p-2'      => 'Dark BG Light',
    ];

    
    public function pagesVideoContents()
    {
        return $this->belongsToMany(VideoContent::class);
    }

    public function pagesPagesections()
    {
        return $this->belongsToMany(Pagesection::class)->orderBy('order', 'ASC');
    }

    public function pagesContentSections()
    {
        return $this->belongsToMany(ContentSection::class)->orderBy('order', 'ASC');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('masthead')->fit('crop', 1200, 500);
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->masthead   = $file->getUrl('masthead');
        }

        return $file;
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->photo   = $file->getUrl('photo');

        }

        return $file;
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

}
