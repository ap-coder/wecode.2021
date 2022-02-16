<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const PROJECT_TYPE_SELECT = [
        'admin'        => 'Custom Admin',
        'full_package' => 'Full Package | Custom Admin, Live Site, Intranet',
        'site'         => 'Custom Live Site',
        'intranet'     => 'Custom Intranet Account Layers',
        'other'        => 'Other',
    ];

    public $table = 'projects';

    protected $dates = [
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'header_image',
        'featured_image',
        'additional_images',
        'challenge_image',
        'solution_image',
    ];

    protected $fillable = [
        'name',
        'intro',
        'body_content',
        'category_id',
        'published',
        'slug',
        'client_id',
        'start_date',
        'project_type',
        'challenges',
        'solutions',
        'meta_title',
        'meta_description',
        'fb_title',
        'tw_title',
        'fb_description',
        'tw_description',
        'website',
        'use_on_clients',
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
        $this->addMediaConversion('portfolio')->fit('crop', 460, 240)->optimize()->sharpen(2);
        $this->addMediaConversion('featured')->fit('crop', 800, 600);
        $this->addMediaConversion('solution')->fit('crop', 700, 400);
        $this->addMediaConversion('challenge')->fit('crop', 700, 400);
        // $this->addMediaConversion('timeline')->fit(Manipulations::FIT_FILL,470, 250)->sharpen(10)->background('FFFFFF')->nonQueued();
    }

    public function projectsTechnologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getHeaderImageAttribute()
    {
        $file = $this->getMedia('header_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->portfolio   = $file->getUrl('portfolio');
        }

        return $file;
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->featured  = $file->getUrl('featured');
        }

        return $file;
    }

    public function getAdditionalImagesAttribute()
    {
        $files = $this->getMedia('additional_images');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getChallengeImageAttribute()
    {
        $file = $this->getMedia('challenge_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->challenge   = $file->getUrl('challenge');
        }

        return $file;
    }

    public function getSolutionImageAttribute()
    {
        $file = $this->getMedia('solution_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->solution   = $file->getUrl('solution');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function projectsContentSections()
    {
        return $this->belongsToMany(ContentSection::class)->orderBy('order', 'ASC');
    }
}
