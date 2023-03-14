<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Rawdata;
use App\Models\Ticket;
use App\Models\Device;
use App\Models\LatestData;
use App\Models\Maintenance;
use App\Models\Setting;
use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;


function setting_web()
{
    $setting = DB::table('settings')->first();
    return $setting;
}

function setting_tolerance_alerts($id, $field_data)
{
    $setting_tolerance_alerts = DB::table('setting_tolerance_alerts')
        ->where('cluster_id', '=', $id)
        ->where('field_data', '=', $field_data)
        ->first();
    return $setting_tolerance_alerts;
}

function getInstance($id, $params)
{
    $instances = DB::table('instances')->where('id', $id)->first();
    return $instances;
}

function getCluster($id)
{
    $clusters = DB::table('clusters')->where('id', $id)->first();
    return $clusters;
}

function getGwid($id)
{
    $clusters = DB::table('gateways')->where('id', $id)->first();
    return $clusters;
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
    $gateway = DB::table('gateways')
        ->where('gwid', '=', $gwid)
        ->first();
    if ($gateway) {
        $gateway_id = $gateway->id;
        DB::table('gateways')
            ->where('gwid', $gwid)
            ->update([
                'updated_at' => $time,
                'status_online' => $status_online,
                'pktfwd_status' => $pktfwdStatus
            ]);
    } else {
        DB::table('gateways')->insert([
            'gwid' => $gwid,
            'status_online' => $status_online,
            'pktfwd_status' => $pktfwdStatus,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
        $gateway_id = DB::getPdo()->lastInsertId();
    }
    // insert log
    DB::table('gateway_logs')->insert([
        'gateway_id' => $gateway_id,
        'status_online' => $status_online,
        'pktfwd_status' => $pktfwdStatus,
        'created_at' => $time,
        'updated_at' => $time,
    ]);
}

function createTiket($device_id, $devEUI, $data, $time)
{
    if ($data != null) {
        // get Intance
        $getInstance = DB::table('devices')
            ->join('clusters', 'devices.cluster_id', '=', 'clusters.id')
            ->join('instances', 'devices.instance_id', '=', 'instances.id')
            ->select('devices.*', 'clusters.cluster_name', 'instances.instance_name')
            ->where('devices.id', $device_id)->first();
        $instanceName = $getInstance->instance_name;
        $clusterName = $getInstance->cluster_name;

        $day = strtolower(date('l'));
        // get operational time
        $operationalDay = DB::table('operational_times')
            ->select('open_hour', 'close_hour')
            ->where('day', $day)
            ->where('instance_id', $getInstance->instance_id)
            ->first();
        if ($operationalDay) {
            if ($operationalDay->open_hour != null && $operationalDay->close_hour != null) {
                // cek masuk ke range jam kerja tidak
                $jam = date('H:i:s');
                if ($jam >= $operationalDay->open_hour && $jam <= $operationalDay->close_hour) {
                    $abnormal = [];
                    foreach ($data as $key => $value) {
                        // get toleransi
                        $ToleranceAlerts = DB::table('setting_tolerance_alerts')
                            ->select('min_tolerance', 'max_tolerance')
                            ->where('field_data', $key)
                            ->where('cluster_id', $getInstance->cluster_id)
                            ->first();
                        if ($value < $ToleranceAlerts->min_tolerance) {
                            array_push($abnormal, "$key less than $ToleranceAlerts->min_tolerance reading results $value");
                        } else if ($value > $ToleranceAlerts->max_tolerance) {
                            array_push($abnormal, "$key more than $ToleranceAlerts->max_tolerance reading results $value");
                        }
                    }
                    if (!empty($abnormal)) {
                        // cek udah ada tiket atw blm
                        $tickets = DB::table('tickets')
                            ->where('device_id', '=', $device_id)
                            ->latest()->first();
                        if ($tickets) {
                            // cek statusnya opened / closed, jika closed buat tiket baru
                            if ($tickets->status == "Closed") {
                                // create tiket
                                $dataTiket = [
                                    'subject' => "Alert from device " . $devEUI,
                                    'description'  => json_encode($abnormal),
                                    'device_id' => $device_id,
                                    'status'   => "Opened",
                                    'created_at' => $time,
                                    'updated_at' => $time,
                                ];
                                $tiket = Ticket::create($dataTiket);
                                $ticket_id = DB::getPdo()->lastInsertId();
                            } else {
                                $ticket_id = $tickets->id;
                                $dataTiket = [
                                    'subject' => "Alert from device " . $devEUI,
                                    'description'  => json_encode($abnormal),
                                    'status'   => "Opened",
                                    'created_at' => $time,
                                    'updated_at' => $time,
                                ];
                                // update ticket
                                DB::table('tickets')
                                    ->where('id', $tickets->id)
                                    ->update($dataTiket);
                            }
                        } else {
                            // create tiket
                            $dataTiket = [
                                'subject' => "Alert from device " . $devEUI,
                                'description'  => json_encode($abnormal),
                                'device_id' => $device_id,
                                'status'   => "Opened",
                                'created_at' => $time,
                                'updated_at' => $time,
                            ];
                            $tiket = Ticket::create($dataTiket);
                            $ticket_id = DB::getPdo()->lastInsertId();
                        }
                        // insert log ticket
                        DB::table('ticket_logs')->insert([
                            'subject' => "Alert from device " . $devEUI,
                            'description' => json_encode($abnormal),
                            'ticket_id' => $ticket_id,
                            'created_at' => $time,
                            'updated_at' => $time,
                        ]);

                        // update device status
                        DB::table('devices')
                            ->where('id', $device_id)
                            ->update(['status' => 'error']);
                    }
                    $cekNotif = Setting::findOrFail(1)->first();
                    // send notif tele
                    if (!$cekNotif->is_notif_tele) {
                        storeMessage($dataTiket, $devEUI, $instanceName, $time, $clusterName);
                    }
                }
            }
        }
    }
}

function storeMessage($dataTiket, $devEUI, $instanceName, $time, $clusterName)
{

    $arr =  json_decode($dataTiket['description']);
    $output = '';
    $i = 1;
    foreach ($arr as $key => $value) {
        $output .= "$i . " . $value . "\n";
        $i++;
    }
    $text = "<b>❌🚫 Alert from Device $devEUI ❌🚫</b>\n\n"
        . "<b>Branches : $instanceName </b>\n"
        . "<b>Cluster : $clusterName </b>\n"
        . "<b>Description Alert : </b>\n"
        . "$output\n"
        . "<b>Date :  $time </b>\n"
        . "<b>Status: Opened </b>\n";
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode' => 'HTML',
        'text' => $text
    ]);
}

function handleCallback($device_id, $request)
{
    $data = $request->data['data'];
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);
    if ($frameId == "01" || $frameId == "81") {
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

        $lastInsertedId = $save->id;
        insertGateway($request->data['gwid'], $save->updated_at, 1, 1);
        // temperatur
        $temperature = hexdec(littleEndian(substr($hex, 2, 4)));
        $rumus_temperature = round(((175.72 * $temperature) / 65536) - 46.85, 2);
        // Humidity
        $humidity = hexdec(littleEndian(substr($hex, 6, 2)));
        $rumus_humidity = round(((125 * $humidity) / 256) - 6, 2);
        // Period
        $period = hexdec(littleEndian(substr($hex, 8, 4)));
        $rumus_period = 2 * $period;
        // Rssi
        $rssi = hexdec(littleEndian(substr($hex, 12, 2)));
        $rumus_rssi = -180 + $rssi;
        // Bateray
        $battery = hexdec(littleEndian(substr($hex, 16, 2)));
        $rumus_battery = round(($battery + 150) * 0.01, 2);
        // Snr
        $snr = hexdec(littleEndian(substr($hex, 14, 2)));
        $cek = substr(littleEndian(substr($hex, 14, 2)), 0, 1);
        if ($cek > 7 || $cek == 'a' || $cek == 'b' || $cek == 'c' || $cek == 'd' || $cek == 'e' || $cek == 'f') {
            $rumus_snr = -$snr / 4;
        } else {
            $rumus_snr = $snr / 4;
        }

        $params = [
            'rawdata_id' => $lastInsertedId,
            'device_id' => $device_id,
            'frame_id' => $frameId,
            'temperature' => $rumus_temperature,
            'humidity' => $rumus_humidity,
            'period' => $rumus_period,
            'rssi' => $rumus_rssi,
            'snr' => $rumus_snr,
            'battery' => $rumus_battery,
            'created_at' => $save->updated_at,
            'updated_at' => $save->updated_at,
        ];
        $dataAbnormal = [
            'temperature' => $rumus_temperature,
            'battery' => $rumus_battery,
            'humidity' => $rumus_humidity
        ];
        DB::table('parseds')->insert($params);
        $nums = LatestData::where('device_id', $device_id)
            ->first();
        if ($nums) {
            DB::table('latest_datas')
                ->where('device_id', $device_id)
                ->update($params);
        } else {
            LatestData::create([
                'device_id' => $device_id,
                'rawdata_id' => $lastInsertedId,
                'frame_id' => $frameId,
                'temperature' => $rumus_temperature,
                'humidity' => $rumus_humidity,
                'period' => $rumus_period,
                'rssi' => $rumus_rssi,
                'snr' => $rumus_snr,
                'battery' => $rumus_battery,
                'created_at' => $save->updated_at,
                'updated_at' => $save->updated_at,
            ]);
        }
        // cek ada mt day tidak
        $now = date('Y-m-d');
        $time = date("G:i:s");
        $getDay = Maintenance::where('date', $now)
            ->first();
        if ($getDay) {
            if ($time > $getDay->start_time and $time < $getDay->end_time) {
                // tidak ada MT Day
            } else {
                createTiket($device_id, $request->devEUI, $dataAbnormal, $save->updated_at);
            }
        } else {
            createTiket($device_id, $request->devEUI, $dataAbnormal, $save->updated_at);
        }

        return "success";
    } else {
        return "Callback Tidak Tercover";
    }
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
