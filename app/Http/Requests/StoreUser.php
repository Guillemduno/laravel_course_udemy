<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'bail|required|min:5|max:10',
            'age' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required',
            'has_money' => 'boolean',
            'has_friends' => 'boolean',
        ];
    }
}
