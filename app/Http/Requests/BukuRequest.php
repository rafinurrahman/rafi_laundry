<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'judul' => 'required|max:100',
            'penerbit' => 'required|max:50',
            'tahun_penerbit' => 'required|integer', 
            'tanggal' => 'date',
            'harga' => 'required',
            'qty' => 'required|integer', 
        ];
    }
}
