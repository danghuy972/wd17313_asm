<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        // lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        
        switch($this->method()):
            case 'POST' : 
                switch ($currentAction):
                    case 'add' :
                        // xây dựng rules validate trong này
                        $rules = [
                            'name'=>'required',
                            'price'=>'required',
                            'description'=>'required',
                            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000' //10000kb <=> 10mb
                        ];
                        break;
                endswitch;
                break;        
        endswitch;
        return $rules;
    }
    public function messages(){
        return [
            'name.required'=> 'Tên không được để trống',
            'name.unique'=> 'Email đã tồn tại',
            'price.required'=> 'Bắt buộc phải nhập giá',
            'description.required'=> 'Bắt buộc phải nhập mô tả',
            'image.required' => 'Bắt buộc phải nhập ảnh'
        ];
    }
}
