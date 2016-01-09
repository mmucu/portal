<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;
use churchapp\Http\Requests;
use Storage;
use Input;

class Image extends Model
{
    private $rules = ['imsge_name' => 'required|mimes:png,jpg'];
    protected $fillable = ['image_name'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
