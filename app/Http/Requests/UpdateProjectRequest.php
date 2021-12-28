<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'additional_images' => [
                'array',
            ],
            'meta_title' => [
                'string',
                'nullable',
            ],
            'meta_description' => [
                'string',
                'nullable',
            ],
            'fb_title' => [
                'string',
                'nullable',
            ],
            'tw_title' => [
                'string',
                'nullable',
            ],
            'fb_description' => [
                'string',
                'nullable',
            ],
            'tw_description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
