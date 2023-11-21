<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'nama' => 'required|string',
			'harga' => 'required|numeric',
			'photo' => 'nullable|image|max:3000',
			'keterangan' => 'required|string',
			'categoryproducts_id' => 'required|exists:App\Models\Categoryproduct,id',
        ];
    }
}
