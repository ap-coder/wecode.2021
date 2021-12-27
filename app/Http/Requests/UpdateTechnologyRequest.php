<?php

namespace App\Http\Requests;

use App\Models\Technology;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTechnologyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('technology_edit');
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
