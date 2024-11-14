<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Video extends Model
{

    protected $fillable = ['section_id', 'title', 'url', 'section_id', 'order','datasubsectionid'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

}
