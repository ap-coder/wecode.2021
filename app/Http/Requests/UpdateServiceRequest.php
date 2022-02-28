<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'sub_title' => [
                'string',
                'nullable',
            ],
            'content_images' => [
                'array',
            ],
            'meta_title' => [
                'string',
                'max:55',
                'nullable',
            ],
            'meta_description' => [
                'string',
                'max:120',
                'nullable',
            ],
            'facebook_title' => [
                'string',
                'nullable',
            ],
            'facebook_desc' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
