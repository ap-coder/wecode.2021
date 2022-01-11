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

class Staff extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'staff';

    protected $appends = [
        'picture',
    ];

    protected $dates = [
        'startdate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'startdate',
        'name',
        'job_title',
        'short_intro',
        'bio',
        'published',
        'slug',
        'linkedin_link',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'other_link',
        'staff_email',
        'gravatar',
        'in_teams',
        'is_author',
        'order',
        'list_on_about',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });

        static::updating(function () {
            $model->slug = str_slug($model->name);
        });        
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getStartdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartdateAttribute($value)
    {
        $this->attributes['startdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPictureAttribute()
    {
        $file = $this->getMedia('picture')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
