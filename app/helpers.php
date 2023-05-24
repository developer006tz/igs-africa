<?php
//this is laravel helper file created in App/Helpers.php

use Illuminate\Support\Str;

function activeMenu($url)
{
    return request()->is($url) ? 'active' : '';
}

function activeMenuMultiple($urls)
{
    foreach ($urls as $url) {
        if (request()->is($url)) {
            return 'active';
        }
    }
}


function activeMenuMultipleArray($urls)
{
    foreach ($urls as $url) {
        if (request()->is($url)) {
            return 'active';
        }
    }
}

function checkKeysExists($value, $keys_array = null)
    {

        $required = $keys_array == null ? array(
            'name',
            'x_axis',
            'y_axis',
            'z_axis',
            'latitude',
            'height',
            'receiver_name',
            'receiver_satellite_system',
            'receiver_serial_number',
            'receiver_firmware_version',
            'receiver_date_installed',
            'antenna_name',
            'antenna_radome',
            'antenna_serial_number',
            'antenna_arp',
            'antenna_marker_north',
            'antenna_marker_east',
            'antenna_date_installed',
            'clock_type',
            'clock_input_frequency',
            'longitude',
            'receiver_elevation_cutoff',
            'antenna_marker_up',
            'clock_effective_dates',
            'pnum',
            'stntype',
            'stnstatus',
            'opstatus',
            'sitecity',
            'sitestate',
            'region',
            'elevation',
            'project',
            'network',
            'multi_types',
            'is_realtime',
            'mean_latency_last_hour',
            'mean_latency_last_day',
            'data_complete_last_hour',
            'data_complete_last_day',
            'status',
            'date_installed',
            'last_rinex_data_year',
            'data_download_link',
            ) : $keys_array;
        $data = array_change_key_case(array_shift($value), CASE_LOWER);
        $keys = str_replace(' ', '_', array_keys($data));
        $results = array_combine($keys, array_values($data));

        if (count(array_intersect_key(array_flip($required), $results)) === count($required)) {
            //All required keys exist!
            $status = 1;
        } else {
            $missing = array_intersect_key(array_flip($required), $results);
            $data_miss = array_diff(array_flip($required), $missing);
            $status = ' Column with title "' . implode(', ', array_keys($data_miss)) . '"  miss from Excel file. Please make sure file is in the same format as a sample file';
        }

        return $status;
    }

     function getDataBySheet($objPHPExcel, $sheet_id)
    {
        $sheet = $objPHPExcel->getSheet($sheet_id);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $headings = $sheet->rangeToArray('A1:' . $highestColumn . 1, NULL, TRUE, FALSE);
        $data = array();
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $rowData[0] = array_combine($headings[0], $rowData[0]);
            $data = array_merge_recursive($data, $rowData);
        }
        return $data;
    }

if (!function_exists('uploadExcel')) {
    function uploadExcel($sheet_name = null)
    {
        try {
            $folder = "storage/uploads/media/";
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }
            $file = request()->file('file');

            if (!$file) {
                return json_encode(['error' => 'No file uploaded']);
            }
            $name = time() . rand(4343, 31243434) . '.' . $file->guessClientExtension();
            $move = $file->move($folder, $name);
            $path = $folder . $name;
            if (!$move) {
                die('upload Error');
            } else {
                $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            }
        } catch (Exception $e) {
            $resp = new \stdClass();
            $resp->success = FALSE;
            $resp->msg = 'Error Uploading file';
            echo json_encode($resp);
        }
        $sheets = $objPHPExcel->getSheetNames();
        if ($sheet_name == null) {
            return getDataBySheet($objPHPExcel, 0);
        } else {
            $data = [];
            foreach ($sheets as $key => $value) {
                $data[$value] = [];
            }
            foreach ($sheets as $key => $value) {
                $excel_data = getDataBySheet($objPHPExcel, $key);
                count($excel_data) > 0 ? array_push($data[$value], $excel_data) : '';
            }
            return $data;
        }
        unlink($path);
    }
}

