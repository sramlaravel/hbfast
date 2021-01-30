<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchesRequest extends FormRequest
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
//            'logo' => 'required_without:id|mimes:jpg,jpeg,png',
            'location_name_ar' => 'required|string|max:100',
            'phone' =>'required|max:100|:locations,phone,' ,
            'location_type' =>'required|max:100|:locations,location_type,' ,
            'email'  => 'required|email|:locations,email,' ,

            'desc_ar'   => 'required|string|max:500',

        ];
    }


    public function messages(){

        return [
            'required'  => 'هذا الحقل مطلوب ',
            'max'  => 'هذا الحقل طويل',
//            'category_id.exists'  => 'القسم غير موجود ',
            'email.email' => 'ضيغه البريد الالكتروني غير صحيحه',
            'desc_ar.string' => 'العنوان لابد ان يكون حروف او حروف وارقام ',
            'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
            'location_type.unique' => 'رقم الهاتف مستخدم من قبل ',
            'email ' => 'البريد الالكتروني مستخدم من قبل ',
            'phone' => 'رقم الهاتف مستخدم من قبل ',


        ];
    }

}
