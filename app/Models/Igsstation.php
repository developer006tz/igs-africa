<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Igsstation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'x_axis',
        'y_axis',
        'z_axiz',
        'latitude',
        'longitude',
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
        'receiver_elevation_cutoff',
        'antenna_marker_up',
        'clock_effective_dates',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'receiver_date_installed' => 'datetime',
        'antenna_date_installed' => 'datetime',
    ];
}
