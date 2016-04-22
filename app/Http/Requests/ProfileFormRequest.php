<?php

namespace churchapp\Http\Requests;

use churchapp\Http\Requests\Request;
use Auth; //not sure it works

class ProfileFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year' => 'exists:years,id',
            'course' => 'exists:departments,name',

        ];
    }

    public function messages(){
        return [
          'image.image' => 'The selected file is not a valid image file'
        ];
    }
}
