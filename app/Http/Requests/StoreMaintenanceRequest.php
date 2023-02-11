<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRequest extends FormRequest
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
            'instance_id' => 'required|exists:App\Models\Instance,id',
			'date' => 'required|date',
			'start_time' => 'required',
			'end_time' => 'required',
			'user_id' => 'required|exists:App\Models\User,id',
        ];
    }
}
