<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
                    'title'     => 'required|max:255',
                    'body'      => 'required',
                    'image'     => 'required|image|mimes:png,jpg,jpeg|max:2048',
                    'name'      => 'required',
                    'excerpt'   => 'nullable'
            ];
        } else {
            return [
                    'title'     => 'required|max:255',
                    'body'      => 'required',
                    'image'     => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                    'name'      => 'required',
                    'excerpt'   => 'nullable'
            ];
        }
    }
}
