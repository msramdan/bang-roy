<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Rawdata;
use App\Models\Ticket;
use App\Models\Device;

if (!function_exists('set_active')) {
    function set_active($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return 'active';
                }
            }
        } else {
            if (Route::is($uri)) {
                return 'active';
            }
        }
    }
}

function setting_web()
{
    $setting = DB::table('settings')->first();
    return $setting;
}

function set_show($uri)
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return 'show';
            }
        }
    } else {
        if (Route::is($uri)) {
            return 'show';
        }
    }
}

function errorMessage($errorCode)
{
    $errors = [
        [
            'code' => 1001,
            'message' => "System Busy",
        ],
        [
            "code" => 1003,
            "message" => "No Token, Please log in again"
        ],
        [
            "code" => 1004,
            "message" => "Invalid Token, Please log in again",
        ],
        [
            "code" => 1006,
            "message" => "Empty Param",
        ],
        [
            "code" => 1007,
            "message" => "Param Error",
        ],
        [
            "code" => 1008,
            "message" => "Query Error",
        ],
        [
            "code" => 1009,
            "message" => "Network Busy"
        ],
        [
            "code" => 1010,
            "message" => "Permission Denied",
        ],
        [
            "code" => 1011,
            "message" => "Region Subnet Not Exist",
        ],
        [
            "code" => 1012,
            "message" => "Region Subnet Already Exist",
        ],
        [
            "code" => 1013,
            "message" => "Extend Proto Not Exist",
        ],
        [
            "code" => 1014,
            "message" => "Extend Proto Already Exist",
        ],
        [
            "code" => 1015,
            "message" => "Platform Conf Not Exist",
        ],
        [
            "code" => 1016,
            "message" => "Extend Proto Already Associate App",
        ],
        [
            "code" => 1017,
            "message" => "Region Subnet Not Support"
        ],
        [
            "code" => 1018,
            "message" => "Region Subnet Already Sync"
        ],
        [
            "code" => 2001,
            "message" => "Invalid Account",
        ],
        [
            "code" => 2002,
            "message" => "Account Not Exist",
        ],
        [
            "code" => 2003,
            "message" => "Account Already Exist",
        ],
        [
            "code" => 2004,
            "message" => "Account or Passwd Error"
        ],
        [
            "code" => 3001,
            "message" => "Application Not Exist",
        ],
        [
            "code" => 3002,
            "message" => "Application Already Exist",
        ],
        [
            "code" => 3003,
            "message" => "Application Batch Delete Error"
        ],
        [
            "code" => 4001,
            "message" => "Device Not Exist",
        ],
        [
            "code" => 4002,
            "message" => "Device Already Exist",
        ],
        [
            "code" => 4003,
            "message" => "Device Update Error",
        ],
        [
            "code" => 4004,
            "message" => "Device Duplicate DevAddr And NwkSKey"
        ],
        [
            "code" => 4005,
            "message" => "Device Count Exceeds Limit"
        ],
        [
            "code" => 4006,
            "message" => "Device Batch Delete Error"
        ],
        [
            "code" => 5001,
            "message" => "Gateway Not Exist"
        ],
        [
            "code" => 5002,
            "message" => "Gateway Already Exist",
        ],
        [
            "code" => 5003,
            "message" => "GatewayID Already Exist",
        ],
        [
            "code" => 5004,
            "message" => "GatewayName Already Exist",
        ],
        [
            "code" => 5005,
            "message" => "Gateway Count Exceeds Limit",
        ],
        [
            "code" => 5006,
            "message" => "Gateway Batch Delete Error"
        ],
        [
            "code" => 14001,
            "message" => "MCGroup Not Exist",
        ],
        [
            "code" => 14002,
            "message" => "MCGroup Already Exist"
        ],
        [
            "code" => 14003,
            "message" => "MCGroup Duplicate DevAddr And NwkSKey",
        ],
        [
            "code" => 14004,
            "message" => "MCGroup Device Count Exceeds Limit"
        ],
        [
            "code" => 14005,
            "message" => "MCGroup Name Already Exist",
        ],
        [
            "code" => 14006,
            "message" => "MCGroup GenAppKey Error",
        ],
        [
            "code" => 14007,
            "message" => "MCGroup Batch Delete Error",
        ],
        [
            "code" => 14008,
            "message" => "MCDevice Batch Bind Error",
        ],
        [
            "code" => 14009,
            "message" => "MCDevice Batch Unbind Error",
        ],
        [
            "code" => 14010,
            "message" => "MCDevice Already Bind Current Group",
        ],
        [
            "code" => 14011,
            "message" => "MCDevice Already Bind Other Group",
        ],
        [
            "code" => 14012,
            "message" => "MCDevice Incompatible With Group",
        ],
        [
            "code" => 14013,
            "message" => "MCDevice Not Exist",
        ],
        [
            "code" => 14014,
            "message" => "MCGroup Not Enable MCRemote",
        ],
        [
            "code" => 14015,
            "message" => "MCGateway Batch Bind Error",
        ],
        [
            "code" => 14016,
            "message" => "MCGateway Batch Unbind Error",
        ],
        [
            "code" => 14017,
            "message" => "MCGateway Already Bind Current Group",
        ],
        [
            "code" => 14018,
            "message" => "MCGateway Incompatible With Group",
        ],
        [
            "code" => 14019,
            "message" => "MCGateway Not Exist",
        ],
        [
            "code" => 14020,
            "message" => "MCDownlink Already Exist",
        ],
        [
            "code" => 14021,
            "message" => "MCDownlink Not Exist",
        ],
        [
            "code" => 14022,
            "message" => "MCGroup Create Error",
        ],
        [
            "code" => 14023,
            "message" => "MCGroup invalid create",
        ],
        [
            "code" => 16001,
            "message" => "Fuota Deployment Already Exist"
        ]
    ];

    foreach ($errors as $i => $error) {
        if ($errors[$i]['code'] == $errorCode) {
            return $errors[$i];
        }
    }

    return [];
}

function base64toHex($string)
{
    $binary = base64_decode($string);
    return bin2hex($binary);
}

function littleEndian($str)
{
    return bin2hex(implode(array_reverse(str_split(hex2bin($str)))));
}

function insertGateway($gwid, $time, $status_online = null, $pktfwdStatus = null)
{
    $gateway = DB::table('gateway')
        ->where('gwid', '=', $gwid)
        ->count();
    if ($gateway < 1) {
        DB::table('gateway')->insert([
            'gwid' => $gwid,
            'status_online' => $status_online,
            'pktfwdStatus' => $pktfwdStatus,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    } else {
        DB::table('gateway')
            ->where('gwid', $gwid)
            ->update([
                'updated_at' => $time,
                'status_online' => $status_online,
                'pktfwdStatus' => $pktfwdStatus
            ]);
    }
}

function createTiket($device_id, $devEUI, $type_device, $data)
{
    if ($data != null) {
        // get subintance
        $subintanceData = DB::table('devices')
            ->join('clusters', 'devices.cluster_id', '=', 'clusters.id')
            ->select('clusters.subinstance_id')
            ->where('devices.id', $device_id)->first();
        if ($subintanceData) {
            $day = strtolower(date('l'));
            // get operational time
            $operationalDay = DB::table('operational_times')
                ->select('open_hour', 'closed_hour')
                ->where('day', $day)
                ->where('subinstance_id', $subintanceData->subinstance_id)
                ->first();
            if ($operationalDay) {
                if ($operationalDay->open_hour != null && $operationalDay->closed_hour != null) {
                    // cek masuk ke range jam kerja tidak
                    $jam = date('H:i:s');
                    if (
                        $jam >= $operationalDay->open_hour && $jam <= $operationalDay->closed_hour
                    ) {
                        $abnormal = [];
                        foreach ($data as $key => $value) {
                            // get toleransi
                            $ToleranceAlerts = DB::table('setting_tolerance_alerts')
                                ->select('min_tolerance', 'max_tolerance')
                                ->where('field_data', $key)
                                ->where('type_device', $type_device)
                                ->where('subinstance_id', $subintanceData->subinstance_id)
                                ->first();

                            if ($value < $ToleranceAlerts->min_tolerance) {
                                array_push($abnormal, "$key less than $ToleranceAlerts->min_tolerance reading results $value");
                            } else if ($value > $ToleranceAlerts->max_tolerance) {
                                array_push($abnormal, "$key more than $ToleranceAlerts->max_tolerance reading results $value");
                            }
                        }
                        if (!empty($abnormal)) {
                            // create tiket
                            Ticket::create([
                                'subject' => "Alert from device " . $devEUI,
                                'description'  => json_encode($abnormal),
                                'is_device'   => 1,
                                'status'   => "alert",
                            ]);
                        }
                        // send notif tele
                    }
                }
            }
        }
    }
}


function handleCallback($device_id, $request)
{
    $data = $request->data['data'];
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);
    // if ($frameId == "00" || $frameId == "10" || $frameId == "71" || $frameId == "95" || $frameId == "21") {
    $save = Rawdata::create([
        'dev_eui' => $request->devEUI,
        'app_id'  => $request->appID,
        'type'   => $request->type,
        'time'   => $request->time,
        'gwid'   => $request->data['gwid'],
        'rssi'   => $request->data['rssi'],
        'snr'    => $request->data['snr'],
        'freq'   => $request->data['freq'],
        'dr'     => $request->data['dr'],
        'adr'    => $request->data['adr'],
        'class'  => $request->data['class'],
        'fcnt'   => $request->data['fCnt'],
        'fport'  => $request->data['fPort'],
        'confirmed' => $request->data['confirmed'],
        'data'  => $request->data['data'],
        'convert'  => base64toHex($request->data['data']),
        'gws'   => json_encode($request->data['gws']),
        'payload_data' => json_encode($request->all()),
    ]);
    return "success";
    //     $lastInsertedId = $save->id;
    //     insertGateway($request->data['gwid'], $save->updated_at);
    //     if ($frameId == "00") {
    //         $uplinkInterval = hexdec(littleEndian(substr($hex, 2, 4)));
    //         $batraiStatus = hexdec(littleEndian(substr($hex, 6, 2)));

    //         if ($batraiStatus > 254) {
    //             $batt = 'Unknown';
    //         } else if ($batraiStatus == 00 || $batraiStatus == '00') {
    //             $batt = 'Power Supply';
    //         } else {
    //             $batt = $batraiStatus / 2.54;
    //         }

    //         $temperatur = hexdec(littleEndian(substr($hex, 8, 4))) * 0.01;
    //         $totalFlow = hexdec(littleEndian(substr($hex, 12, 16))) * 0.1;
    //         $params = [
    //             'rawdata_id' => $lastInsertedId,
    //             'device_id' => $device_id,
    //             'frame_id' => $frameId,
    //             'uplink_interval' => $uplinkInterval,
    //             'batrai_status' => $batt,
    //             'temperatur' => $temperatur,
    //             'total_flow' => $totalFlow,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //         ];
    //         $dataAbnormal = [
    //             'temperature' => $temperatur,
    //             'water_bateray' => $batt
    //         ];
    //     } else if ($frameId == "10") {
    //         $temperatur = hexdec(littleEndian(substr($hex, 2, 4))) * 0.01;
    //         $params = [
    //             'rawdata_id' => $lastInsertedId,
    //             'device_id' => $device_id,
    //             'frame_id' => $frameId,
    //             'temperatur' => $temperatur,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //         ];
    //         $dataAbnormal = [
    //             'temperature' => $temperatur,
    //         ];
    //     } else if ($frameId == "71") {
    //         $totalFlow = hexdec(littleEndian(substr($hex, 2, 16))) * 0.01;
    //         $params = [
    //             'rawdata_id' => $lastInsertedId,
    //             'device_id' => $device_id,
    //             'frame_id' => $frameId,
    //             'total_flow' => $totalFlow,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //         ];
    //         $dataAbnormal = [];
    //     } else if ($frameId == "95") {
    //         $batraiStatus = hexdec(littleEndian(substr($hex, 2, 2)));
    //         if ($batraiStatus > 254) {
    //             $batt = 'Unknown';
    //         } else if ($batraiStatus == 00 || $batraiStatus == '00') {
    //             $batt = 'Power Supply';
    //         } else {
    //             $batt = $batraiStatus / 2.54;
    //             $dataAbnormal = [
    //                 'water_bateray' => $batt,
    //             ];
    //         }
    //         $params = [
    //             'rawdata_id' => $lastInsertedId,
    //             'device_id' => $device_id,
    //             'frame_id' => $frameId,
    //             'batrai_status' => $batt,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //         ];
    //         $dataAbnormal = [];
    //     } else if ($frameId == "21") {
    //         if ($hex == '2101') {
    //             $status_valve = 'Open';
    //         } else if ($hex == '2181') {
    //             $status_valve = 'Close';
    //         } else {
    //             $status_valve = 'Unknown';
    //         }
    //         $params = [
    //             'rawdata_id' => $lastInsertedId,
    //             'device_id' => $device_id,
    //             'frame_id' => $frameId,
    //             'status_valve' => $status_valve,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //         ];
    //         $dataAbnormal = [];
    //     }
    //     $yesterdayStart = Carbon::now()->subDay(2)->hour(00)->minute(00)->second(00);
    //     $yesterdayEnd   = Carbon::now()->subDay(2)->hour(23)->minute(59)->second(59);
    //     $today = Carbon::today()->format('Y-m-d');
    //     $yesterdayData = ParsedWaterMater::where('device_id', $device_id)
    //         ->whereBetween("created_at", [$yesterdayStart, $yesterdayEnd])
    //         ->orderBy('created_at', 'desc')
    //         ->first();

    //     $device = Device::find($device_id);
    //     DB::table('parsed_water_meter')->insert($params);
    //     DB::table('master_latest_datas')
    //         ->where('device_id', $device_id)
    //         ->update($params);

    //     createTiket($device_id, $request->devEUI, $type_device = 'water_meter', $dataAbnormal);

    //     if (isset($params['total_flow'])) {
    //         if ($yesterdayData) {
    //             $usage = floatval($params['total_flow']) - floatval($yesterdayData->total_flow);
    //         } else {
    //             $usage = floatval($params['total_flow']);
    //         }

    //         $dailyUsage = DailyUsageDevice::where('date', $today)->where('device_id', $device_id)->first();

    //         if (!$dailyUsage) {
    //             DailyUsageDevice::create(
    //                 [
    //                     'device_id' => $device_id,
    //                     'cluster_id' => $device->cluster_id,
    //                     'device_type' => 'water_meter',
    //                     'date' => $today,
    //                     'usage' => $usage,
    //                 ]
    //             );
    //         } else {
    //             $dailyUsage->update([
    //                 'device_id' => $device_id,
    //                 'cluster_id' => $device->cluster_id,
    //                 'device_type' => 'water_meter',
    //                 'date' => $today,
    //                 'usage' => $usage,
    //             ]);
    //         }
    //     }
    //     return "success";
    // } else if ($frameId == "0f") {
    //     $save = Rawdata::create([
    //         'devEUI' => $request->devEUI,
    //         'appID'  => $request->appID,
    //         'type'   => $request->type,
    //         'time'   => $request->time,
    //         'gwid'   => $request->data['gwid'],
    //         'rssi'   => $request->data['rssi'],
    //         'snr'    => $request->data['snr'],
    //         'freq'   => $request->data['freq'],
    //         'dr'     => $request->data['dr'],
    //         'adr'    => $request->data['adr'],
    //         'class'  => $request->data['class'],
    //         'fcnt'   => $request->data['fCnt'],
    //         'fport'  => $request->data['fPort'],
    //         'confirmed' => $request->data['confirmed'],
    //         'data'  => $request->data['data'],
    //         'convert'  => base64toHex($request->data['data']),
    //         'gws'   => json_encode($request->data['gws']),
    //         'payload_data' => json_encode($request->all()),
    //         'type_payload'  => 'Alert',
    //     ]);
    //     $lastInsertedId = $save->id;
    //     insertGateway($request->data['gwid'], $save->updated_at);
    //     // create tiket water meter cek operation time dan hour
    //     // get list alert
    //     $listFixedError = array(
    //         '0f1402' => 'Illegal Movement Warning',
    //         '0f1202' => 'Quick leak warning',
    //         '0f1203' => 'Slow air leak warning',
    //         '0f1002' => 'Temperature warning',
    //         '0f9501' => 'Low battery alarm',
    //         '0f9101' => 'Low voltage alarm',
    //         '0f1000' => 'High temperature alarm',
    //         '0f1001' => 'Low temperature alarm',
    //     );

    //     $bitError = array(
    //         0 => 'Tube failure (The pipe burst)',
    //         1 => 'Leakage failure',
    //         2 => 'Sensor failure',
    //         3 => 'Reverse installation position',
    //         4 => 'bit4',
    //         5 => 'bit5',
    //         6 => 'bit6',
    //         7 => 'bit7',
    //         8 => 'Abnormal sensor sound track',
    //         9 => 'The battery abnormity',
    //         10 => 'The valve abnormity',
    //         11 => 'Strong magnetic abnormity',
    //         12 => 'Abnormal power switch',
    //         13 => 'Hall sensor abnormity',
    //         14 => 'Reserve bit14',
    //         15 => 'Reserve bit15',
    //     );

    //     $convert = base64toHex($request->data['data']);
    //     $dataArr = str_split($convert, 6);
    //     $error = [];
    //     foreach ($dataArr as $code) {
    //         if (array_key_exists($code, $listFixedError)) {
    //             $getError = $listFixedError[$code];
    //             array_push($error, $getError);
    //         } else {
    //             $command = littleEndian(substr($hex, 2, 4));
    //             $arrCommand = str_split($command, 1);
    //             $index = 15;
    //             foreach ($arrCommand as  $value) {
    //                 $bin = base_convert($value, 16, 2);
    //                 $fix = str_pad($bin, 4, "0", STR_PAD_LEFT);
    //                 $dataArr2 = str_split($fix, 1);
    //                 foreach ($dataArr2 as $dataBin) {
    //                     if ($dataBin == "1") {
    //                         $getError = $bitError[$index];
    //                         array_push($error, $getError);
    //                     }
    //                     $index = $index - 1;
    //                 }
    //             }
    //         }
    //     }
    //     Ticket::create([
    //         'subject' => "Alert from device " . $request->devEUI,
    //         'description'  => json_encode($error),
    //         'is_device'   => 1,
    //         'status'   => "alert",
    //     ]);
    //     return "Alert Data Water Meter Success";
    // } else {
    //     return "Payload Data Tidak Tercover";
    // }
}

function cekAbjHex($decimal)
{
    if ($decimal == 10) {
        return 'a';
    } else if ($decimal == 11) {
        return 'b';
    } else if ($decimal == 12) {
        return 'c';
    } else if ($decimal == 13) {
        return 'd';
    } else if ($decimal == 14) {
        return 'e';
    } else if ($decimal == 15) {
        return 'f';
    }
}

function cekAngka($huruf)
{
    if ($huruf == 'a') {
        return 10;
    } else if ($huruf == 'b') {
        return 11;
    } else if ($huruf == 'c') {
        return 12;
    } else if ($huruf == 'd') {
        return 13;
    } else if ($huruf == 'e') {
        return 14;
    } else if ($huruf == 'f') {
        return 15;
    }
}
