<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:permissions,name,'.$this->get('id').'|max:255',
            'display_name'=>'unique:permissions,display_name,'.$this->get('id').'|max:255',
            'cid'=>'int',
        ];
    }
}
