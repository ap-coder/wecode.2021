<?php

namespace App\Http\Requests;

use App\Models\VideoContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVideoContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('video_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:video_contents,id',
        ];
    }
}
