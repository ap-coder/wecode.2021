<?php

namespace App\Http\Requests;

use App\Models\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
            'contributor' => [
                'string',
                'nullable',
            ],
            'contributor_link' => [
                'string',
                'nullable',
            ],
            'contributor_2' => [
                'string',
                'nullable',
            ],
            'contributor_2_link' => [
                'string',
                'nullable',
            ],
            'attachments' => [
                'array',
            ],
            'menu_order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'comment_count' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
