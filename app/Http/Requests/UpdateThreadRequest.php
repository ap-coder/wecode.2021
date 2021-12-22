<?php

namespace App\Http\Requests;

use App\Models\Thread;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateThreadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('thread_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'additional_photos' => [
                'array',
            ],
            'attachments' => [
                'array',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
