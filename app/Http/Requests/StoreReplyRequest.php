<?php

namespace App\Http\Requests;

use App\Models\Reply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReplyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reply_create');
    }

    public function rules()
    {
        return [
            'additional_photos' => [
                'array',
            ],
        ];
    }
}
