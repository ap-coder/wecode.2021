<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'sub_title' => [
                'string',
                'nullable',
            ],
            'path' => [
                'string',
                'nullable',
            ],
            'slug' => [
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
            'fb_title' => [
                'string',
                'nullable',
            ],
            'fb_description' => [
                'string',
                'nullable',
            ],
            'tw_title' => [
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
