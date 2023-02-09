<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRawdataRequest extends FormRequest
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
            'dev_eui' => 'required|string|min:1|max:100',
			'app_id' => 'required|numeric',
			'type' => 'required|string|min:1|max:50',
			'time' => 'required|string|min:1|max:100',
			'gwid' => 'required|string|min:1|max:100',
			'rssi' => 'required|string|min:1|max:20',
			'snr' => 'required|string|min:1|max:20',
			'freq' => 'required|string|min:1|max:20',
			'dr' => 'required|string|min:1|max:10',
			'adr' => 'required|string|min:1|max:10',
			'class' => 'required|string|min:1|max:10',
			'fcnt' => 'required|string|min:1|max:10',
			'fport' => 'required|string|min:1|max:10',
			'confirmed' => 'required|string|min:1|max:10',
			'data' => 'required|string',
			'gws' => 'required|string',
			'payload_data' => 'required|string',
			'convert' => 'required|string',
			'type_payload' => 'required|string|min:1|max:20',
        ];
    }
}
