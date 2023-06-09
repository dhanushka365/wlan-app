<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DeviceController extends Controller
{
    public function updateStatus(Request $request)
    {
        if ($request->filled('relayId') && $request->filled('newStatus')) {
            $relayId = $request->input('relayId');
            $newStatus = $request->input('newStatus');

            try {
                // Update the status in the database
                DB::table('relay')
                    ->where('Relay_ID', $relayId)
                    ->update(['Status' => $newStatus]);

                return redirect()->back();
            } catch (\Exception $e) {
                return response('Error: ' . $e->getMessage(), 500);
            }
        }

        return response('Invalid data', 400);
    }

    
    public function getBuzzerStatus(Request $request)
    {
        if ($request->has('Buzzer_ID')) {
            $buzzer_id = $request->input('Buzzer_ID');
            $status = DB::table('buzzer_table')
                ->where('Buzzer_ID', $buzzer_id)
                ->value('Status');

            if ($status !== null) {
                return $status;
            } else {
                return "Error: Buzzer ID not found.";
            }
        } else {
            return "Error: Buzzer ID not provided.";
        }
    }
    
    public function getStatus(Request $request)
    {
        if ($request->has('Relay_ID')) {
            $relay_id = $request->input('Relay_ID');
            $status = DB::table('relay')
                ->where('Relay_ID', $relay_id)
                ->value('Status');

            if ($status !== null) {
                return $status;
            } else {
                return "Error: Relay ID not found.";
            }
        } else {
            return "Error: Relay ID not provided.";
        }
    }

    public function saveData(Request $request)
    {
        if (
            $request->filled('voltage') &&
            $request->filled('current') &&
            $request->filled('power') &&
            $request->filled('energy') &&
            $request->filled('frequency') &&
            $request->filled('pf')
        ) {
            // Get current date and time
            $date = now()->format('Y-m-d');
            $time = now()->format('H:i:s');

            $voltage = $request->input('voltage');
            $current = $request->input('current');
            $power = $request->input('power');
            $energy = $request->input('energy');
            $frequency = $request->input('frequency');
            $pf = $request->input('pf');
            $accountNo = 144444;

            try {
                // Save the data to the database
                DB::table('elec_usage')->insert([
                    'account_no' => $accountNo,
                    'voltage' => $voltage,
                    'current' => $current,
                    'power' => $power,
                    'energy' => $energy,
                    'frequency' => $frequency,
                    'pf' => $pf,
                    'date' => $date,
                    'time' => $time,
                ]);

                return response('OK');
            } catch (\Exception $e) {
                return response('Error: ' . $e->getMessage(), 500);
            }
        }

        return response('No data received', 400);
    }
}