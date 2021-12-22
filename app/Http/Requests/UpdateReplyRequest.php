<?php

namespace App\Http\Requests;

use App\Models\Reply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReplyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reply_edit');
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
