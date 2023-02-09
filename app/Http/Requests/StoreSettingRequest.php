<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
            'aplication_name' => 'required|string|min:1|max:255',
			'endpoint_nms' => 'required|string|min:1|max:255',
			'is_notif_tele' => 'required|boolean',
        ];
    }
}
