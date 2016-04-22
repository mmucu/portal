<?php

namespace churchapp;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model implements SluggableInterface
{
    use SluggableTrait;


    protected $sluggable = array(
        'build_from' => 'alias',
        'save_to' => 'slug',
    );
    private $rules = [
                        'reg_no' => 'required',
                            'course' => 'required',
                                ];
    protected $fillable = ['reg_no','course','image_name','about', 'alias', 'hobbies','mobile_number','favorite_verse'];

    public function user()
    {
        return $this->belongsTo('\churchapp\User');
    }

    public function year_of_study()
    {
        return $this->belongsTo('\churchapp\YearOfStudy');
    }

    public function images()
    {
        return $this->morphMany('\churchapp\Image', 'imageable');
    }

    public function makeSlug(){
        return $this->user->firstname.$this->user->lastname;
    }

    public function getUser()
    {
        return User::find($this->user_id);
    }


}
