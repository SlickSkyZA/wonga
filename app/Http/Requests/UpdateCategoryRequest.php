<?php

namespace App\Http\Requests;

use App\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_edit');
    }

    public function rules()
    {
        return [
            'type'       => [
                'string',
                'required',
                'unique:categories,type,' . request()->route('category')->id,
            ],
            'percentage' => [
                'string',
                'required',
            ],
        ];
    }
}
