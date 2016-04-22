<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function Faculty()
    {
     return $this->belongsTo('churchapp\Faculty');
    }
}
