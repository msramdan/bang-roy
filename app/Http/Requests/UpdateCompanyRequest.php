<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'nama_perusahaan' => 'required|string|max:150',
            'telepon' => 'required|string|max:15',
            'no_whatsapp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:companies,email,' . $this->company->id,
            'akte_notaris' => 'required|string|max:150',
            'kep_men_kum_ham' => 'required|string|max:150',
            'npwp' => 'required|string|max:150',
            'nib' => 'required|string|max:150',
            'sppkp' => 'required|string|max:150',
            'logo' => 'image|max:3000',
            'deskripsi' =>  'required|string',
        ];
    }
}
