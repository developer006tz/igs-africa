<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Corsstation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'pnum',
        'stntype',
        'stnstatus',
        'opstatus',
        'sitecity',
        'sitestate',
        'region',
        'latitude',
        'longitude',
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
    ];

    protected $searchableFields = ['*'];

    protected $table = 'corstations';

    protected $casts = [
        'date_installed' => 'date',
    ];
}
