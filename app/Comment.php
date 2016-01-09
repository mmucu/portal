<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    private $rules = ['body' => 'required', 'creator_id' => 'required'];
    protected $fillable = ['body', 'creator_id'];

    public function post()
    {
        return $this->belongsTo('\churchapp\Post');
    }

    public function getUser()
    {
        return User::find($this->creator_id);
    }
}
