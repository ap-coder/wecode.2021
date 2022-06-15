<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Reply extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'replies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'attachments',
        'main_photo',
        'additional_photos',
    ];

    protected $fillable = [
        'author_id',
        'published',
        'private',
        'best_answer',
        'thread_id',
        'content_area',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function attachment()
    {
      return $this->morphMany(AttachmentData::class, 'model');
    }
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }

    public function getAttachmentsAttribute()
    {
        return $this->morphMany(AttachmentData::class, 'model')->where('collection_name','attachments')->pluck('attachment_id')->toArray();
        // return $this->getMedia('attachments')->last();
    }
    
    public function getMainPhotoAttribute()
    {
        return $this->morphOne(AttachmentData::class, 'model')->where('collection_name','main_photo')->value('attachment_id');
        // $file = $this->getMedia('main_photo')->last();
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
