<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class PeminjamanRequest extends FormRequest
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
    public function rules(Request $r)
    {

        $rules = [
            "anggota_id" => "required",
            "pinjaman_awal" => "required",
            "angsur_perbulan" => "required",
            "lama_angsur" => "required",
            "bunga" => "required",
            "tanggal_pinjam" => "required",
            "total_pinjaman" => "required",
        ];
        
        return $rules;
    }
}
