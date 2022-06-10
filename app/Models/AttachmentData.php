<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentData extends Model
{
    use HasFactory;

    public $table = 'attachment_data';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'attachment_id',
        'model_id',
        'model_type',
        'collection_name',
        'created_at',
        'updated_at',
    ];

    public function model()
    {
        return $this->morphTo();
    }
    
}
