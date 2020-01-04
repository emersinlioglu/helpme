<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = "project";
    protected $fillable = ['name', 'description', 'active'];
    public $timestamps = false;

    public function projectImages()
    {
        return $this->hasMany('App\ProjectImage');
    }

}
