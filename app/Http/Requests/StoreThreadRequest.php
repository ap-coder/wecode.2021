<?php

namespace App\Http\Requests;

use App\Models\Thread;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreThreadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('thread_create');
    }

    public function rules()
    {
        return [
            'topic_id'   => [
                'required',
                'integer',
            ],
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
