<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceRequest extends FormRequest
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
            'dev_eui' => 'required|string|min:1|max:200',
            'dev_name' => 'required|string|min:1|max:200',
            'dev_addr' => 'required|string|min:1|max:200',
            'dev_type' => 'required|string|max:200',
            'region' => 'required|string|min:1|max:200',
            'subnet_id' => 'required|exists:App\Models\Subnet,id',
            'auth_type' => 'required|string|min:1|max:200',
            'fcnt' => 'required|string|min:1|max:200',
            'fport' => 'required|string|min:1|max:200',
            'last_seen' => 'required|string|min:1|max:200',
            'instance_id' => 'required|exists:App\Models\Instance,id',
            'app_eui' => 'required|string|min:1|max:200',
            'app_key' => 'required|string|min:1|max:200',
            'app_key' => 'required|string|min:1|max:200',
            'nwk_s_key' => 'required|string|min:1|max:200',
            'support_class_b' => 'required|string|min:1|max:200',
            'support_class_c' => 'required|string|min:1|max:200',
            'mac_version' => 'required|string|min:1|max:200',
            'cluster_id' => 'required|exists:App\Models\Cluster,id',
        ];
    }
}
