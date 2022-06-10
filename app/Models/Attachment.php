<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    public $table = 'attachments';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'at_uid',
        'at_title',
        'at_desc',
        'at_file',
        'at_files',
        'at_mimes',
        'at_type',
        'at_size',
        'at_dimensions',
        'at_modified',
        'trash',
        'created_at',
        'updated_at',
    ];
    
}
