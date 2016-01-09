<?php

namespace churchapp\Http\Requests;

use churchapp\Http\Requests\Request;
use Auth;

class GroupFormRequest extends Request
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

            'name' => 'required',
            'description' => 'required'

        ];
    }
}
