<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Rawdata;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CallbackController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->type == 'gwstat' || $request->type == 'gwconnection') {
                insertGateway($request->gwID, date('Y-m-d H:i:s'), $request->data['online'], $request->data['_pktfwdStatus']);
                return response()->json([
                    'message' => 'Callback Gateway Success',
                ], 200);
            } else {
                $device = Device::where('dev_eui', $request->devEUI)->first();
                if ($device) {
                    $respondHandler = handleCallback($device->id, $request);
                    if ($respondHandler == 'success') {
                        return response()->json([
                            'message' => 'Callback Device Success',
                        ], 200);
                    } else {
                        return response()->json([
                            'message' => $respondHandler,
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'message' => 'Device Tidak Di Temukan',
                    ], 404);
                }
            }
        } catch (Exception $err) {
            \Log::error($err);
            return response()->json(['success' => false, 'message' => $err->getMessage()], 500);
        }
    }
}
