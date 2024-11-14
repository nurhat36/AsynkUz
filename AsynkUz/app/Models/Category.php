<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    // Üst kategori (Parent)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Alt kategoriler (Children)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Kategorinin bağlı olduğu kurslar
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
