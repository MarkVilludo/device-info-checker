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
            'is_cookie' => 'nullable|boolean',
            'is_session_storage' => 'nullable|boolean',
            'is_canvas' => 'nullable|boolean',
            'is_silverlight' => 'nullable|boolean',
            'is_mobile' => 'nullable|boolean',
            'is_mobile_major' => 'nullable|boolean',
            'is_mobile_android' => 'nullable|boolean',
            'is_mobile_opera' => 'nullable|boolean',
            'is_mobile_windows' => 'nullable|boolean',
            'is_mobile_blackberry' => 'nullable|boolean',
            'is_mobile_ios' => 'nullable|boolean',
            'is_iphone' => 'nullable|boolean',
            'is_ipad' => 'nullable|boolean',
            'is_ipod' => 'nullable|boolean',
            'device_type' => 'nullable|string',
            'is_windows' => 'nullable|boolean',
            'is_mac' => 'nullable|boolean',
            'is_linux' => 'nullable|boolean',
            'is_ubuntu' => 'nullable|boolean',
            'ip' => 'required|string|ip',
            'fingerprint_portrait' => 'nullable',
            'fingerprint_landscape' => 'nullable',
        ];
    }
    
    /**
     * Handle validation error message
     * @return <json>
    */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json(['errors' => $validator->errors()], 422);
        
        throw new HttpResponseException($response);
    }
}
