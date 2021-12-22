<?php

namespace App\Http\Requests;

use App\Models\VideoContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVideoContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('video_content_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'alternate_title' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'vimeo' => [
                'string',
                'nullable',
            ],
            'other_video' => [
                'string',
                'nullable',
            ],
            'meta_title' => [
                'string',
                'nullable',
            ],
            'meta_description' => [
                'string',
                'nullable',
            ],
            'fbt' => [
                'string',
                'nullable',
            ],
            'fbd' => [
                'string',
                'nullable',
            ],
            'twt' => [
                'string',
                'nullable',
            ],
            'twd' => [
                'string',
                'nullable',
            ],
            'pages.*' => [
                'integer',
            ],
            'pages' => [
                'array',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
