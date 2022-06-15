<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'services';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'featured_image',
        'content_images',
        'banner',
    ];

    protected $fillable = [
        'title',
        'sub_title',
        'service_text',
        'service_text_2',
        'excerpt',
        'price',
        'meta_title',
        'meta_description',
        'facebook_title',
        'facebook_desc',
        'published',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopePublished($query)
	{
		return $query->where('published', 1);
	}

    public function attachment()
    {
      return $this->morphMany(AttachmentData::class, 'model');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFeaturedImageAttribute()
    {
        return $this->morphOne(AttachmentData::class, 'model')->where('collection_name','featured_image')->value('attachment_id');
        // $file = $this->getMedia('featured_image')->last();
        // if ($file) {
        //     $file->url       = $file->getUrl();
        //     $file->thumbnail = $file->getUrl('thumb');
        //     $file->preview   = $file->getUrl('preview');
        // }

        // return $file;
    }

    public function getContentImagesAttribute()
    {
        return $this->morphMany(AttachmentData::class, 'model')->where('collection_name','content_images')->pluck('attachment_id')->toArray();
        // $files = $this->getMedia('content_images');
        // $files->each(function ($item) {
        //     $item->url = $item->getUrl();
        //     $item->thumbnail = $item->getUrl('thumb');
        //     $item->preview = $item->getUrl('preview');
        // });

        // return $files;
    }

    public function getBannerAttribute()
    {
        return $this->morphOne(AttachmentData::class, 'model')->where('collection_name','banner')->value('attachment_id');
        // $file = $this->getMedia('banner')->last();
        // if ($file) {
        //     $file->url       = $file->getUrl();
        //     $file->thumbnail = $file->getUrl('thumb');
        //     $file->preview   = $file->getUrl('preview');
        // }

        // return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function servicesContentSections()
    {
        return $this->belongsToMany(ContentSection::class)->orderBy('order', 'ASC');
    }
}
