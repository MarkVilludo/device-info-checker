<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientDataRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'time_zone' => 'nullable|string',
            'language' => 'nullable|string',
            'color_depth' => 'nullable|integer',
            'current_resolution' => 'nullable|string',
            'available_resolution' => 'nullable|string',
            'fonts' => 'nullable|string',
            'os' => 'nullable|string',
            'engine' => 'nullable|string',
            'is_cookie' => 'nullable|string',
            'is_session_storage' => 'nullable|string',
            'is_canvas' => 'nullable|string',
            'is_silverlight' => 'nullable|string',
            'is_mobile' => 'nullable|string',
            'is_mobile_major' => 'nullable|string',
            'is_mobile_android' => 'nullable|string',
            'is_mobile_opera' => 'nullable|string',
            'is_mobile_windows' => 'nullable|string',
            'is_mobile_blackberry' => 'nullable|string',
            'is_mobile_ios' => 'nullable|string',
            'is_iphone' => 'nullable|string',
            'is_ipad' => 'nullable|string',
            'is_ipod' => 'nullable|string',
            'device_type' => 'nullable|string',
            'is_windows' => 'nullable|string',
            'is_mac' => 'nullable|string',
            'is_linux' => 'nullable|string',
            'is_ubuntu' => 'nullable|string',
            'ip' => 'required|string|ip',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json(['errors' => $validator->errors()], 422);
        
        throw new HttpResponseException($response);
    }
}
