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
            'is_cookie' => 'required|boolean',
            'is_session_storage' => 'required|boolean',
            'is_canvas' => 'required|boolean',
            'is_silverlight' => 'required|boolean',
            'is_mobile' => 'required|boolean',
            'is_mobile_major' => 'required|boolean',
            'is_mobile_android' => 'required|boolean',
            'is_mobile_opera' => 'required|boolean',
            'is_mobile_windows' => 'required|boolean',
            'is_mobile_blackberry' => 'required|boolean',
            'is_mobile_ios' => 'required|boolean',
            'is_iphone' => 'required|boolean',
            'is_ipad' => 'required|boolean',
            'is_ipod' => 'required|boolean',
            'device_type' => 'required|string',
            'is_windows' => 'required|boolean',
            'is_mac' => 'required|boolean',
            'is_linux' => 'required|boolean',
            'is_ubuntu' => 'required|boolean',
            'ip' => 'required|string|ip',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json(['errors' => $validator->errors()], 422);
        
        throw new HttpResponseException($response);
    }
}
