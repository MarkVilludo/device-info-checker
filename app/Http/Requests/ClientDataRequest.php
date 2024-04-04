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
            'time_zone' => 'required|string',
            'language' => 'required|string',
            'color_depth' => 'required|integer',
            'current_resolution' => 'required|string',
            'available_resolution' => 'required|string',
            'fonts' => 'required|string',
            'os' => 'required|string',
            'engine' => 'required|string',
            'is_cookie' => 'required|string',
            'is_session_storage' => 'required|string',
            'is_canvas' => 'required|string',
            'is_silverlight' => 'required|string',
            'is_mobile' => 'required|string',
            'is_mobile_major' => 'required|string',
            'is_mobile_android' => 'required|string',
            'is_mobile_opera' => 'required|string',
            'is_mobile_windows' => 'required|string',
            'is_mobile_blackberry' => 'required|string',
            'is_mobile_ios' => 'required|string',
            'is_iphone' => 'required|string',
            'is_ipad' => 'required|string',
            'is_ipod' => 'required|string',
            'device_type' => 'required|string',
            'is_windows' => 'required|string',
            'is_mac' => 'required|string',
            'is_linux' => 'required|string',
            'is_ubuntu' => 'required|string',
            'ip' => 'required|string|ip',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json(['errors' => $validator->errors()], 422);
        
        throw new HttpResponseException($response);
    }
}
