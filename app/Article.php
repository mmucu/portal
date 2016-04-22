<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','body', 'created_by'];

    public function categories(){
        return $this->belongsToMany('churchapp\Category')->withTimestamps();
    }

    public function getCreator()
    {
        return User::find($this->created_by);
    }

    public function updates(){
        return $this->morphMany('\churchapp\Update', 'updatable');
    }
}
