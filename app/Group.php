<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    private $rules = ['name' => 'required',
                        'description' => 'required',
                        'creator_id' => 'required'];
    protected $fillable = ['name', 'description','creator_id'];

    public function posts()
    {
        return $this->morphMany('\churchapp\Post','postable');
    }
    public function users()
    {
        return $this->belongsToMany('\churchapp\User')->withTimestamps();
    }

    public function getCreator()
    {
        return User::find($this->creator_id);
    }
}
