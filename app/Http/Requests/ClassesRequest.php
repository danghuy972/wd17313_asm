<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassesRequest extends FormRequest
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
                            'location'=>'required',
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
            'location.required'=> 'Địa điểm không được để trống',
        ];
    }
}
