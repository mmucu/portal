<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;
use churchapp\Http\Requests;
use Storage;
use Input;

class Image extends Model
{
    private $rules = ['image_name' => 'required|mimes:png,jpg'];
    protected $fillable = ['image_name','description'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function updates(){
        return $this->morphMany('\churchapp\Update', 'updatable');
    }

    public function getCreator()
    {
        return User::find($this->imageable_id);
    }
}
