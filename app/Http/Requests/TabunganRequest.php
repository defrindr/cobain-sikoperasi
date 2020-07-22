<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TabunganRequest extends FormRequest
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
            "anggota_id" => "required",
            "anggota_id" => "required",
            "saldo" => "required|numeric|min:".request()->cms['saldo_awal_minimal'],
        ];
    }
}
