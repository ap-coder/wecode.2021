<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Thread extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'threads';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'photo',
        'additional_photos',
        'attachments',
    ];

    protected $fillable = [
        'title',
        'body',
        'published',
        'closed',
        'slug',
        'author_id',
        'topic_id',
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

    public function threadsContentSections()
    {
        return $this->belongsToMany(ContentSection::class)->orderBy('order', 'ASC');
    }

    public function getPhotoAttribute()
    {
        return $this->morphOne(AttachmentData::class, 'model')->where('collection_name','photo')->value('attachment_id');

        // $file = $this->getMedia('photo')->last();
        // if ($file) {
        //     $file->url       = $file->getUrl();
        //     $file->thumbnail = $file->getUrl('thumb');
        //     $file->preview   = $file->getUrl('preview');
        // }

        // return $file;
    }

    public function getAdditionalPhotosAttribute()
    {
        return $this->morphMany(AttachmentData::class, 'model')->where('collection_name','additional_photos')->pluck('attachment_id')->toArray();

        // $files = $this->getMedia('additional_photos');
        // $files->each(function ($item) {
        //     $item->url = $item->getUrl();
        //     $item->thumbnail = $item->getUrl('thumb');
        //     $item->preview = $item->getUrl('preview');
        // });

        // return $files;
    }

    public function getAttachmentsAttribute()
    {
        return $this->morphMany(AttachmentData::class, 'model')->where('collection_name','attachments')->pluck('attachment_id')->toArray();
        // return $this->getMedia('attachments');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'thread_id', 'id');
    }

    public function threadReplies()
    {
        return $this->hasMany(Reply::class, 'thread_id', 'id');
    }
}
