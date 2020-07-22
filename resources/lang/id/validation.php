<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Nilai :attribute must be accepted.',
    'active_url' => 'Nilai :attribute bukan merupakan URL yang benar.',
    'after' => 'Nilai :attribute harus berupa date after :date.',
    'after_or_equal' => 'Nilai :attribute harus merupakan tanggal setelah atau sama dengan :date.',
    'alpha' => 'Nilai :attribute hanya dapat berupa huruf.',
    'alpha_dash' => 'Nilai :attribute hanya dapat berupa huruf, angka, dashes dan garis bawah.',
    'alpha_num' => 'Nilai :attribute hanya dapat berupa huruf dan angka.',
    'array' => 'Nilai :attribute harus berupa array.',
    'before' => 'Nilai :attribute harus berupa date before :date.',
    'before_or_equal' => 'Nilai :attribute harus berupa date before or equal to :date.',
    'between' => [
        'numeric' => 'Nilai :attribute harus diantara :min dan :max.',
        'file' => 'Nilai :attribute harus diantara :min dan :max kilobytes.',
        'string' => 'Nilai :attribute harus diantara :min dan :max characters.',
        'array' => 'Nilai :attribute must have between :min dan :max items.',
    ],
    'boolean' => 'Nilai :attribute harus bernilai bernar atau salah.',
    'confirmed' => 'Nilai :attribute confirmation does not match.',
    'date' => 'Nilai :attribute bukan tanggal yang valid.',
    'date_equals' => 'Nilai :attribute harus berupa date equal to :date.',
    'date_format' => 'Nilai :attribute does not match the format :format.',
    'different' => 'Nilai :attribute dan :other must be different.',
    'digits' => 'Nilai :attribute must be :digits digits.',
    'digits_between' => 'Nilai :attribute harus diantara :min dan :max digits.',
    'dimensions' => 'Nilai :attribute has invalid image dimensions.',
    'distinct' => 'Nilai :attribute field has a duplicate value.',
    'email' => 'Nilai :attribute harus berupa email addressyang benar.',
    'ends_with' => 'Nilai :attribute must end with one of the following: :values',
    'exists' => 'Nilai selected :attribute is invalid.',
    'file' => 'Nilai :attribute harus berupa file.',
    'filled' => 'Nilai :attribute field must have a value.',
    'gt' => [
        'numeric' => 'Nilai :attribute harus lebih besar dari :value.',
        'file' => 'Nilai :attribute harus lebih besar dari :value kilobytes.',
        'string' => 'Nilai :attribute harus lebih besar dari :value characters.',
        'array' => 'Nilai :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Nilai :attribute harus lebih besar atau sama dengan :value.',
        'file' => 'Nilai :attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string' => 'Nilai :attribute harus lebih besar atau sama dengan :value characters.',
        'array' => 'Nilai :attribute must have :value items or more.',
    ],
    'image' => 'Nilai :attribute harus berupa image.',
    'in' => 'Nilai selected :attribute is invalid.',
    'in_array' => 'Nilai :attribute field does not exist in :other.',
    'integer' => 'Nilai :attribute harus berupa integer.',
    'ip' => 'Nilai :attribute harus berupa IP addressyang benar.',
    'ipv4' => 'Nilai :attribute harus berupa IPv4 addressyang benar.',
    'ipv6' => 'Nilai :attribute harus berupa IPv6 addressyang benar.',
    'json' => 'Nilai :attribute harus berupa JSON stringyang benar.',
    'lt' => [
        'numeric' => 'Nilai :attribute harus lebih kecil dari :value.',
        'file' => 'Nilai :attribute harus lebih kecil dari :value kilobytes.',
        'string' => 'Nilai :attribute harus lebih kecil dari :value characters.',
        'array' => 'Nilai :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Nilai :attribute harus lebih kecil atau sama dengan :value.',
        'file' => 'Nilai :attribute harus lebih kecil atau sama dengan :value kilobytes.',
        'string' => 'Nilai :attribute harus lebih kecil atau sama dengan :value characters.',
        'array' => 'Nilai :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Nilai :attribute tidak dapat lebi besar dari :max.',
        'file' => 'Nilai :attribute tidak dapat lebi besar dari :max kilobytes.',
        'string' => 'Nilai :attribute tidak dapat lebi besar dari :max characters.',
        'array' => 'Nilai :attribute may not have more than :max items.',
    ],
    'mimes' => 'Nilai :attribute harus berupa file bertipe: :values.',
    'mimetypes' => 'Nilai :attribute harus berupa file bertipe: :values.',
    'min' => [
        'numeric' => 'Nilai :attribute tidak boleh lebih kecil daripada :min.',
        'file' => 'Nilai :attribute tidak boleh lebih kecil daripada :min kilobytes.',
        'string' => 'Nilai :attribute tidak boleh lebih kecil daripada :min characters.',
        'array' => 'Nilai :attribute must have at least :min items.',
    ],
    'not_in' => 'Nilai selected :attribute is invalid.',
    'not_regex' => 'Nilai :attribute format is invalid.',
    'numeric' => 'Nilai :attribute harus berupa angka.',
    'password' => 'Nilai password salah.',
    'present' => 'Nilai :attribute field must be present.',
    'regex' => 'Nilai :attribute format is invalid.',
    'required' => 'Nilai :attribute tidak boleh kosong.',
    'required_if' => 'Nilai :attribute tidak boleh kosong ketika :other adalah :value.',
    'required_unless' => 'Nilai :attribute tidak boleh kosong unless :other adalah in :values.',
    'required_with' => 'Nilai :attribute tidak boleh kosong ketika :values adalah present.',
    'required_with_all' => 'Nilai :attribute tidak boleh kosong ketika :values are present.',
    'required_without' => 'Nilai :attribute tidak boleh kosong ketika :values adalah not present.',
    'required_without_all' => 'Nilai :attribute tidak boleh kosong ketika none of :values are present.',
    'same' => 'Nilai :attribute dan :other harus sama.',
    'size' => [
        'numeric' => 'Nilai :attribute must be :size.',
        'file' => 'Nilai :attribute must be :size kilobytes.',
        'string' => 'Nilai :attribute must be :size characters.',
        'array' => 'Nilai :attribute must contain :size items.',
    ],
    'starts_with' => 'Nilai :attribute must start with one of the following: :values',
    'string' => 'Nilai :attribute harus berupa string.',
    'timezone' => 'Nilai :attribute harus berupa zone yang benar.',
    'unique' => 'Nilai :attribute telah digunakan untuk data lain.',
    'uploaded' => 'Nilai :attribute failed to upload.',
    'url' => 'Nilai :attribute format adalah invalid.',
    'uuid' => 'Nilai :attribute harus berupa UUID yang benar.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'nama' => [
            'required' => 'Nama wajib diisi.',
        ],
        'keterangan' => [
            'required' => 'Keterangan wajib diisi.'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
