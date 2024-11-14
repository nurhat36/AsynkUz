<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Course extends Model
{
    protected $fillable = [
        'teacher_id',
        'title',
        'category_id',
        'description',
        'preview_image',
        'intro_video',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class)->orderBy('order');
    }

}
