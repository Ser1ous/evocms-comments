<?php

namespace EvolutionCMS\Stream\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $attributes = [
        'published' => false,
    ];

    protected $fillable = ['name', 'message', 'site_content_id'];

    protected $guarded = ['published'];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

}