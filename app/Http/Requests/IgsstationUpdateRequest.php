<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IgsstationUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'x_axis' => ['required', 'numeric'],
            'y_axis' => ['required', 'numeric'],
            'z_axiz' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'receiver_name' => ['required', 'max:255', 'string'],
            'receiver_satellite_system' => ['required', 'max:255', 'string'],
            'receiver_serial_number' => ['required', 'max:255', 'string'],
            'receiver_firmware_version' => ['required', 'max:255', 'string'],
            'receiver_date_installed' => ['required', 'date'],
            'antenna_name' => ['required', 'max:255', 'string'],
            'antenna_radome' => ['nullable', 'max:255', 'string'],
            'antenna_serial_number' => ['required', 'max:255', 'string'],
            'antenna_arp' => ['nullable', 'max:255', 'string'],
            'antenna_marker_north' => ['required', 'numeric'],
            'antenna_marker_east' => ['required', 'numeric'],
            'antenna_date_installed' => ['required', 'date'],
            'clock_type' => ['nullable', 'max:255', 'string'],
            'clock_input_frequency' => ['nullable', 'numeric'],
            'receiver_elevation_cutoff' => ['nullable', 'numeric'],
            'antenna_marker_up' => ['required', 'numeric'],
            'clock_effective_dates' => ['nullable', 'max:255', 'string'],
        ];
    }
}
