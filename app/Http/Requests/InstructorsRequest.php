<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorsRequest extends FormRequest
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
        //tạo ra 1 mảng ;
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
                            'email'=>'required|email|unique:instructors',
                            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000', //10000kb <=> 10mb
                            'phone' => 'required',
                            'bio' => 'required'
                        ];
                        break;
                endswitch;
                break;        
        endswitch;
        return $rules;
    }
    public function messages(){
        return [
            'name.required'=> 'Tên khum được để trống',
            'email.required'=> 'Bắt buộc phải nhập email',
            'email.email'=> 'Phải là kiểu email',
            'email.unique'=> 'Email đã tồn tại',
            'image.required' => 'Bắt buộc phải nhập ảnh',
            'phone.required' => 'Bắt buộc phải nhập số điện thoại',
            'bio.required' => 'Bắt buộc phải nhập tiểu sử',
        ];
    }
}
