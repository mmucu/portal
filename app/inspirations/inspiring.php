<?php

namespace churchapp\inspirations;

use Illuminate\Support\Collection;
use Storage;

class inspiring
/*
 * this might not stand for long, just a quick place to put verses to
 * show in the homepage....
 */
{
    public static function quote()
    {

        $file = Storage::get('english-nkjv.txt');
        $verses = explode("\n",$file);
        $raw_verse = Collection::make($verses)->random();
        $verse = explode("\t", $raw_verse);
        return ['verse' => $verse[0], 'ref' => $verse[1]];
    }

}