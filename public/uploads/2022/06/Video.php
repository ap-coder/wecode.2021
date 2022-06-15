<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes, HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['deleted_at',];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',

        'mode',

        'is_duet',

        'device',

        'description',

        'filename',

        'status',

        'tag_user',

        'created_at',

        'updated_at',

        'deleted_at',
    ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appends = ['video_url', 'file_extension', 'thumbnail', 'share_url'];

    public function getVideoUrlAttribute()
    {
        if (file_exists( public_path() . '/uploads/videos/'.$this->filename)) {
            return url('').'/uploads/videos/'.$this->filename;
        } else {
            return url('').'/assets/images/users/user.png';
        } 
    }

    public function getFileExtensionAttribute()
    {
        if ($this->filename !== '') {
            return File::extension($this->filename);
        } else {
            return '';
        } 
    }

    public function getThumbnailAttribute()
    {
        if (file_exists(public_path() . '/uploads/videos/' . str_replace(File::extension($this->filename), 'png', $this->filename))) {
            return url('') . '/uploads/videos/' . str_replace(File::extension($this->filename), 'png', $this->filename);
        } else {
            return '';
        }
    }

    public function getShareUrlAttribute()
    {
        return route('share') . '?video=' . base64_encode($this->id);
    }

    /*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/
    public function notification()
    {
        return $this->morphMany(Notification::class, 'notificationable');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function sound()
    {
        return $this->hasOne(Sounds::class, 'id', 'sound_id');
    }

    public function like()
    {
        return $this->hasMany(VideoLike::class, 'video_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(VideoComment::class, 'video_id', 'id');
    }

    public function is_saved()
    {
        return $this->hasMany(VideoSaved::class, 'video_id', 'id');
    }

    public function reported()
    {
        return $this->hasMany(VideoReported::class, 'video_id', 'id');
    }

    public function view()
    {
        return $this->hasMany(VideoView::class, 'video_id', 'id');
    }

    public function share()
    {
        return $this->hasMany(VideoShare::class, 'video_id', 'id');
    }

    public function pin()
    {
        return $this->hasMany(VideoPin::class, 'video_id', 'id');
    }

    public function following()
    {
        return $this->hasMany(Follower::class, 'user_id', 'user_id');

        // return $this->hasOneThrough(
        //     Owner::class,
        //     Car::class,
        //     'follower_id', // Foreign key on the cars table...
        //     'user_id', // Foreign key on the owners table...
        //     'id', // Local key on the mechanics table...
        //     'id' // Local key on the cars table...
        // );
    }
    /*
|--------------------------------------------------------------------------
| RELATIONS End
|--------------------------------------------------------------------------
*/

    /*
|--------------------------------------------------------------------------
| SCOPES
|--------------------------------------------------------------------------
*/
    public function scopeId($query, $value)
    {
        return $value ? $query->where('id', $value) : $query;
    }
    public function scopeUserid($query, $value)
    {
        return $value ? $query->where('user_id', $value) : $query;
    }
    public function scopeMode($query, $value)
    {
        return $value ? $query->where('mode', $value) : $query;
    }
    public function scopeStatus($query, $value)
    {
        return $value ? $query->where('status', $value) : $query;
    }
    public function scopePublish($query, $request = null)
    {
        if(@$request->mine == 'all'){
            return $query;
        }else if(@$request->mine == 'draft'){
            return $query->where('status', '=', 'draft');
        }else{
            return $query->where('status', '=', 'publish');
        }
    }
    public function scopeIshaving($query, $request)
    {
        // dump($request->all());
        if(@$request->mine == 'liked'){
            return $query->having('is_liked', 1);
        }
        if(@$request->mine == 'saved'){
            return $query->having('is_saved', 1);
        }
        if(@$request->mine == 'reported'){
            return $query->having('is_reported', 1);
        }
    }
    public function scopePrivatetofollower($query, $request)
    {
        if($request->my_user_id === NULL){
            return $query;
        }elseif(@$request->user_id === @$request->my_user_id){
            return $query;
        }
        $is_following = $query->with(array('user' => function ($query) use ($request) {
            $query->withCount(['follower as is_following' => function ($query) use ($request) {
                $query->where('follower_id', $request->my_user_id);
            }]);
        }))->get()->pluck('user')->flatten()->pluck('is_following')->first();
        
        if($is_following === 0){
            return $query->mode('public');
        }
    }

    public function scopePrivatetofollower2($query, $user_id)
    {
        $is_following = $query
        ->withCount(['following as is_following' => function ($query) use ($user_id) {
            $query->where('follower_id', $user_id);
        }])->get()->pluck('is_following');
        
        // dump($query->get());
        if($is_following === 0){
            return $query->mode('public');
        }
    }

    /*
|--------------------------------------------------------------------------
| SCOPES End
|--------------------------------------------------------------------------
*/
}
