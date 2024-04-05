<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientDataRequest;
use App\Models\DeviceInformation;
use Carbon\Carbon;

class ClientDataController extends Controller
{
    public function __construct(DeviceInformation $deviceInformation) {
        $this->deviceInformation = $deviceInformation;
    }
    public function store(ClientDataRequest $request)
    {
        // Fetch clients from the database based on specific criteria
        $clients = $this->deviceInformation->where('ip', '=', $request->ip)
                         ->whereDate('created_at', Carbon::today())
                         ->get();
        
        $testArray = [];
        // Iterate through the filtered clients and calculate similarity score
        foreach ($clients as $client) {
            $similarityScore = $this->calculateSimilarityScore($request->all(), $client);
            $testArray[] = $similarityScore;
            // Check if the similarity score is above the threshold (80%)
            if ($similarityScore >= 80) {
                // Client with similar data found
                $data['success'] = false;
                $data['message'] = 'Failed, ther is existing client data';
                $data['probability'] = $similarityScore.'%';
                return response()->json($data, 200);
            }
        }
        // return $testArray;
        // No similar client found
        $this->deviceInformation->fill($request->all())->save();
        return response()->json(['success' => true, 'message' => 'Successfully saved client data'], 200);
    }
    
    private function calculateSimilarityScore($requestData, $client)
    {
        $matchingFields = [];
        $totalFields = count($requestData);
        
        // Iterate through the fields in the requestData
        foreach ($requestData as $key => $value) {
            // Exclude the "ip" field from comparison
            if ($key !== 'ip') {
                // Check if the field exists in the client object
                if (isset($client->$key)) {
                    // Increment matchingFields if the field value matches
                    if (is_bool($value)) {
                        // If the value is boolean, compare it directly
                        if ($client->$key === $value) {
                            $matchingFields[] = 1;
                        }
                    } else {
                        // If the value is not boolean, compare the value only not including the data types
                        if ($client->$key == $value) {
                            $matchingFields[] = 1;
                        }
                    }
                } else {
                    // If any field doesn't exist in the client object, return 0 similarity
                    $matchingFields[] = 0;
                }
            }
        }
        $matchCountField = array_sum($matchingFields);
        // Calculate similarity score as a percentage
        return ($matchCountField / ($totalFields - 1)) * 100; // Exclude the "ip" field from totalFields
    }

}
