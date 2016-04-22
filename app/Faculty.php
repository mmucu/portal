<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function departments() {
        return $this->hasMany('churchapp\Department');
    }
}
