<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParsedRequest extends FormRequest
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
            'device_id' => 'required|exists:App\Models\Device,id',
			'rawdata_id' => 'required|exists:App\Models\Rawdata,id',
			'frame_id' => 'required|string|min:1|max:20',
			'temperature' => 'required|numeric',
			'humidity' => 'required|numeric',
			'period' => 'required|numeric',
			'rssi' => 'required|numeric',
			'snr' => 'required|numeric',
			'battery' => 'required|numeric',
        ];
    }
}
