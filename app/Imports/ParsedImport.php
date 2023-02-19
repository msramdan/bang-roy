<?php

namespace App\Imports;

use App\Models\Device;
use App\Models\Parsed;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use RealRashid\SweetAlert\Facades\Alert;

class ParsedImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        $errorMessage = [];
        $totalError = 0;
        foreach ($rows as $index => $row) {
            if ($row['dev_eui']) {
                $device = Device::where('dev_eui', $row['dev_eui'])->first();
                if ($device) {
                    try {
                        $device_id = $device->id;
                        Parsed::create([
                            'device_id' => $device_id,
                            // 'rawdata_id' => $row['rawdata_id'],
                            'frame_id' => $row['frame_id'],
                            'temperature' => $row['temperature'],
                            'humidity' => $row['humidity'],
                            'period' => $row['period'],
                            'rssi' => $row['rssi'],
                            'snr' => $row['snr'],
                            'battery' => $row['battery'],
                        ]);
                    } catch (\Throwable $th) {
                        $error = $th->getMessage();
                        $position =  $index + 2;
                        $totalError = $totalError + 1;
                        array_push($errorMessage, "Import data failed row $position because $error");
                        continue;
                    }
                } else {
                    $error = 'Device Not Found';
                    $position =  $index + 2;
                    $totalError = $totalError + 1;
                    array_push($errorMessage, "Import data failed row $position because $error");
                }
            }
        }
        Session::forget('errorMessage', 'totalError');
        Session::put('errorMessage', $errorMessage);
        Session::put('totalError', $totalError);
    }
}
