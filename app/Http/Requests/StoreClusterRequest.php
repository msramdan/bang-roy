<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClusterRequest extends FormRequest
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
			'cluster_kode' => 'required|string|min:1|max:50',
			'cluster_name' => 'required|string|min:1|max:200',
        ];
    }
}
