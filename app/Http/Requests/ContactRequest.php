<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ContactRequest extends FormRequest
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
            'fullname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'zip11' => 'required|max:8',
            'addr11' => 'required',
            'builging_name' => 'nullable',
            'opinion' => 'required|max:120',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'zip11'  => mb_convert_kana($this->zip11, 'as'),
        ]);
    }

}
