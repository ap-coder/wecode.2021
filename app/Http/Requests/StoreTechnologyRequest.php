<?php

namespace App\Http\Requests;

use App\Models\Technology;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTechnologyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('technology_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'projects.*' => [
                'integer',
            ],
            'projects' => [
                'array',
            ],
        ];
    }
}
