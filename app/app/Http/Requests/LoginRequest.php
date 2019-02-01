<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'ئېلخەتنى تولدۇرۇڭ',
            'email.email' => 'ئېلخەت ئۆلچەملىك بولمىدى',
            'email.max' => 'ئېلخەت ھەرپ سانى 255 دىن كۆپ بولسا بولمايدۇ',
            'password.required' => 'پارولنى تولدۇرۇڭ',
        ];
    }
}
