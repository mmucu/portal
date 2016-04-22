<?php

namespace churchapp;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    private $rules = [
        'name' => 'required',
        'description' => 'required',
        'host' => 'required',
        'venue' => 'required',
        'starting' => 'required',
        'ending' => 'required',
    ];

    protected $fillable = ['name','description','host','venue', 'starting','ending', 'image_name', 'audience'];

    protected $dates = ['starting', 'ending'];

    public function isDueDate(){

        $now = Carbon::now();
        if ($this->time->diff($now->days == 0)){
            return true;
        }
        else{
            return false;
        }
    }

    public function daysToEvent(){

        $now = Carbon::now();
        return $this->time->diff($now->days);
    }

    public function isExpired(){
        $now = Carbon::now();
        if ($this->time->diff($now->days < 0)){
            return true;
        }
        else{
            return false;
        }

    }

    public function updates(){
        return $this->morphMany('\churchapp\Update', 'updatable');
    }

}
