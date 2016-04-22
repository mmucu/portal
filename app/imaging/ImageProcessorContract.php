<?php

/**
 * Created by PhpStorm.
 * User: MMUST CU
 * Date: 4/11/2016
 * Time: 12:58 AM
 */
namespace churchapp\imaging;

use Illuminate\Http\Request;

interface ImageProcessorContract
{
    public function listImageFiles();
    public function checkIfProfileHasImage();
    public function uploadAndStore(Request $request);
    public function multipleUploadAndStore($file);
}