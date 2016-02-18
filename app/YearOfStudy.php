<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;

class YearOfStudy extends Model
{
    protected $fillable = ['year'];

    protected $table = 'years';

    public function members()
    {
        return $this->hasMany('\churchapp\Profile');
    }
}
