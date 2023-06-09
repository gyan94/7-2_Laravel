<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
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
            'image' => ['required', 'image', 'max:5000'],
            'name' => ['required', 'string', 'max:30'],
            'genre' => ['required'],
            'area' => ['required'],
            'address' => ['max:40'],
            'comment' => ['required', 'string', 'max:255'],
        ];
    }
}
