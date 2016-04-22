<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $fillable = ['creator_id'];
    protected $rules = ['creator_id' => 'required'];

    public function updatable(){
        return $this->morphTo();
    }
}
