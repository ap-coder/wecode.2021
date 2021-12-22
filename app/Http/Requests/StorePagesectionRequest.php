<?php

namespace App\Http\Requests;

use App\Models\Pagesection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePagesectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pagesection_create');
    }

    public function rules()
    {
        return [
            'section' => [
                'required',
            ],
            'section_nickname' => [
                'string',
                'nullable',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pages.*' => [
                'integer',
            ],
            'pages' => [
                'array',
            ],
        ];
    }
}
