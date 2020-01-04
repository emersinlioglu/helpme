<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $table = 'project_image';
    protected $fillable = ['title', 'text', 'image', 'text_position','status', 'project_id'];
    public $timestamps = false;
}
