<?php

namespace App\Http\Requests;

use App\Models\Technology;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTechnologyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('technology_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:technologies,id',
        ];
    }
}
