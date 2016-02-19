<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private $rules = ['title' => 'required',
        'body' => 'required'];
    protected $fillable = ['title', 'body','image'];

    public function postable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany('\churchapp\Comment');
    }

    public function getUser()
    {
        return User::find($this->postable_id);
    }
}
