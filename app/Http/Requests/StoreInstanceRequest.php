<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstanceRequest extends FormRequest
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
            // 'app_id' => 'required|numeric',
            // 'app_name' => 'required|string|min:1|max:200',
            'push_url' => 'required|url|min:1|max:200',
            'instance_name' => 'required|string|min:1|max:200',
            'address' => 'required|string',
            'provinsi_id' => 'required|exists:App\Models\Province,id',
            'kabkot_id' => 'required|exists:App\Models\Kabkot,id',
            'kecamatan_id' => 'required|exists:App\Models\Kecamatan,id',
            'kelurahan_id' => 'required|exists:App\Models\Kelurahan,id',
            'zip_kode' => 'required|string|min:1|max:20',
            'email' => 'required|string|min:1|max:100',
            'phone' => 'required|string|min:1|max:13',
            'longitude' => 'required|string|min:1|max:200',
            'latitude' => 'required|string|min:1|max:200',
            'field_data.*' => 'required',
            'min_tolerance.*' => 'required',
            'max_tolerance.*' => 'required',
            'day.*' => 'required',
            'opening_hour.*' => 'nullable',
            'closing_hour.*' => 'nullable',
        ];
    }
}
