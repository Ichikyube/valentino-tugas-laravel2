<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        if(request()->isMethod('post')) {
            return [
                'name'          => 'required|string|max:258',
                'file_media'    => 'required|image|mime:jpeg,png,jpg,svg,gif|max:2048',
                'description'   => 'required|string',
                'price'         => 'required|integer|min:0',
            ];
        } else {
            return [
                'name'          => 'required|string|max:258',
                'file_media'    => 'nullable|image|mime:jpeg,png,jpg,svg,gif|max:2048',
                'description'   => 'required|string',
                'price'         => 'required|integer|min:0',
            ];
        }
    }

    public function message()
    {
        if(request()->isMethod('post')) {
            return [
                'name.required' =>  'Name is required!',
                'file_media.required' => 'File is required!',
                'file_media.image' => 'File must be image!',
                'description.required' => 'description is required!'
            ];
        } else {
            return [
                'name.required' =>  'Name is required!',
                'description.required' => 'description is required!'
            ];
        }
    }
}
