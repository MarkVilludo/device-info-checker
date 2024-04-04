<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientDataRequest;
use App\Models\DeviceInformation;

class ClientDataController extends Controller
{
    //
    public function __construct(DeviceInformation $deviceInformation) {
        $this->deviceInformation = $deviceInformation;
    }

    public function store(ClientDataRequest $request)
    {
        $this->deviceInformation->fill($request->all())->save();
        return response()->json(['success' => true, 'message' => 'Successfully saved client data' ], 200);
    }
}
