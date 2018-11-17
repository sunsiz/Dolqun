<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilghetRequest extends FormRequest
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
            'ug' => 'required|max:255',
            'zh' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'ug.required' => 'ئۇيغۇرچە ئاتىلىشىنى يېزىڭ',
            'ug.max' => 'ئۇيغۇرچە ئاتىلىشى ھەرپ سانى 255 دىن كۆپ بولمىسۇن',
            'zh.required' => 'خەنزۇچە ئاتىلىشىنى يېزىڭ',
            'zh.max' => 'خەنزۇچە ئاتىلىشى ھەرپ سانى 255 دىن كۆپ بولمىسۇن'
        ];
    }
}
