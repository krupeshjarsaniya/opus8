<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'unique:agents'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'sales_type' => ['required', 'string'],
            'sales_percentage' => ['required', 'int'],
        ];
    }

    public function messages()
    {
        return [
            'sales_percentage.integer' => "Sales percentage must a digit",
        ];
    }
}
