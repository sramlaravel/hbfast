<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnersRequest  extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  //admin guard
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {


        return [

            'title' => 'required|string|max:400',
            'description' => 'required|string|max:2000',
            'model' => 'required|string|max:10',
            'link'=>'nullable|string|max:250',
            'image' => 'nullable:id|mimes:jpg,jpeg,png|max:10048',
            'logo' => 'nullable:id|mimes:jpg,jpeg,png|max:10048',
          //  'statu' => 'required|in:1',

        ];
    }

    public function messages()
    {
        return [
            'required_without:id'=>'الصوره مطلوبه',
            'required' => 'هذا الحقل مطلوب',
            'in' => 'القيم المدخلة غير صحيحة ',
            'title.string' => 'اسم العنوان  لابد ان يكون احرف',
            'model.string' => 'اسم المودل  لابد ان يكون احرف  انجلبزي ',
            'logo.max' => 'لوقو هذه لا يزيد حجمها عن 10 ميجا بايت ',
            'image.max' => 'الصورة هذه لا يزيد حجمها عن 10 ميجا بايت  ',
            'title.max'=>'وصف العنوان يزيد عن 400 حرف اخي العزيز اختصر الموضوع',
             'model.max'=>'عزيزي لازم ان المودل لا بتعدى 10 احرف'
        ];
    }
}
