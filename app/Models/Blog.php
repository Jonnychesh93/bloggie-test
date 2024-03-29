<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expired_at',
        'image_url',
        'is_live',
        'main_content',
        'published_at',
        'slug',
        'title',
        'second_content'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'featured_at'   => 'datetime',
        'expired_at'    => 'datetime',
        'is_live'       => 'boolean',
        'published_at'  => 'datetime',
    ];
}
