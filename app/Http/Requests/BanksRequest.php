<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanksRequest extends FormRequest
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
//
            'name' => 'required|string|max:500',

            'image' => 'required_without:id|mimes:jpg,jpeg,png|max:10048',



        ];
    }


    public function messages(){

        return [
            'required'  => 'هذا الحقل مطلوب ',
            'max'  => 'هذا الحقل طويل',
            'news_desc.string' => 'العنوان لابد ان يكون حروف او حروف وارقام ',
            'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
            'image.max ' => 'حجم الصوره يجب ان يكون اصغر 10 ميجا ',
            'image.required_without' => 'الصوره مطلوبه الرجاء تحميل الصوره',



        ];
    }

}
