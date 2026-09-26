<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $memberId = $this->route('member');

        return [
            'nama' => 'required|string|max:100',

            'nim' => [
                'required',
                'string',
                'max:20',
                Rule::unique('members', 'nim')->ignore($memberId),
            ],

            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('members', 'email')->ignore($memberId),
            ],

            'nomor_telepon' => 'required|string|max:15',

            'alamat' => 'required|string',

            'status' => 'required|in:aktif,nonaktif',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama anggota wajib diisi.',
            'nama.string' => 'Nama anggota harus berupa teks.',
            'nama.max' => 'Nama anggota maksimal 100 karakter.',

            'nim.required' => 'NIM wajib diisi.',
            'nim.string' => 'NIM harus berupa teks.',
            'nim.max' => 'NIM maksimal 20 karakter.',
            'nim.unique' => 'NIM sudah terdaftar.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 100 karakter.',
            'email.unique' => 'Email sudah terdaftar.',

            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.string' => 'Nomor telepon harus berupa teks.',
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'status.required' => 'Status anggota wajib dipilih.',
            'status.in' => 'Status anggota harus aktif atau nonaktif.',
        ];
    }
}