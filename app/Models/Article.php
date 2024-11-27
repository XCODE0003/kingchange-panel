<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'subtitle_en', 
        'content_en',
        'metatitle_en',
        'metadescription_en',
        'title_ru',
        'subtitle_ru',
        'content_ru', 
        'metatitle_ru',
        'metadescription_ru',
        'title_ua',
        'subtitle_ua',
        'content_ua',
        'metatitle_ua',
        'metadescription_ua',
        'image_en',
        'image_ru',
        'image_ua',
        'date'
    ];
}
