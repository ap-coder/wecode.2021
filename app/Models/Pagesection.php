<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagesection extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pagesections';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'section',
        'section_nickname',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
