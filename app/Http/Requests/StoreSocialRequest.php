<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link_facebook' => 'nullable|string',
			'link_instagram' => 'nullable|string',
			'link_youtube' => 'nullable|string',
			'link_twitter' => 'nullable|string',
        ];
    }
}
