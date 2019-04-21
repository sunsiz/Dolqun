<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:80',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'ئاكونت نامنى تولدۇرۇڭ',
            'name.max' => 'ئاكونت نامى 80 ھەرپتىن كۆپ بولمىسۇن',
            'email.required' => 'ئېلخەتنى تولدۇرۇڭ',
            'email.email' => 'ئېلخەت ئۆلچەملىك بولمىدى',
            'email.max' => 'ئېلخەت ھەرپ سانى 255 دىن كۆپ بولسا بولمايدۇ',
            'email.unique' => 'بۇ ئېلخەت تېزىملىتىپ بولغان',
            'password.required' => 'پارولنى تولدۇرۇڭ',
            'password.confirmed' => 'ئىككى قېتىملىق پارول بىردەك ئەمەس',
            'password.min' => 'پارول ھەرپ سانى 6 دىن كەم بولمىسۇن',
        ];
    }
}
