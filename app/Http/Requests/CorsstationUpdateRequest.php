<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorsstationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'pnum' => ['required', 'max:255', 'string'],
            'stntype' => ['required', 'in:gps,glonass ,galileo,beidou'],
            'stnstatus' => ['required', 'in:installed,not-installed'],
            'opstatus' => ['required', 'in:operable,non-operational'],
            'sitecity' => ['nullable', 'max:255', 'string'],
            'sitestate' => ['nullable', 'max:255', 'string'],
            'region' => ['nullable', 'max:255', 'string'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'elevation' => ['nullable', 'numeric'],
            'project' => ['nullable', 'in:pi,gnn,other'],
            'network' => ['nullable', 'in:pi,ggn,other'],
            'multi_types' => [
                'nullable',
                'in:gps,gps+glo+gal+bds,gps+glo+gal+bds+irss,gps+glo,gps+glo+gal+bds+irns+sbas,gps+glo+gal+bds+qzss,dbs,irss,glo,sbas,gal',
            ],
            'is_realtime' => ['nullable', 'numeric'],
            'mean_latency_last_hour' => ['nullable', 'numeric'],
            'mean_latency_last_day' => ['nullable', 'numeric'],
            'data_complete_last_hour' => ['nullable', 'numeric'],
            'data_complete_last_day' => ['nullable', 'numeric'],
            'status' => [
                'nullable',
                'in:ok,unavilable,non-operational,failed,other',
            ],
            'date_installed' => ['nullable', 'date'],
            'last_rinex_data_year' => ['nullable', 'numeric'],
            'data_download_link' => ['nullable', 'max:255', 'string'],
        ];
    }
}
