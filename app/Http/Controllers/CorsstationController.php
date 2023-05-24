<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Corsstation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CorsstationStoreRequest;
use App\Http\Requests\CorsstationUpdateRequest;

class CorsstationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Corsstation::class);

        $search = $request->get('search', '');

        $corsstations = Corsstation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.corsstations.index',
            compact('corsstations', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Corsstation::class);

        return view('app.corsstations.create');
    }

    public function create_excel(Request $request): View
    {
        $this->authorize('create', Corsstation::class);

        return view('app.corsstations.create-excel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CorsstationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Corsstation::class);

        $validated = $request->validated();

        $corsstation = Corsstation::create($validated);

        return redirect()
            ->route('corsstations.edit', $corsstation)
            ->withSuccess(__('crud.common.created'));
    }

    public function store_excel(Request $request): RedirectResponse
    {
        $this->authorize('create', Corsstation::class);

        ini_set('max_execution_time', 300);
        $data = uploadExcel();
        $status = checkKeysExists(
            $data,
            array(
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
                'clock_effective_dates'
            )
        );

        if ($status == 1) {
            // validate
            $stations = [];
            foreach ($data as $element) {
                $stations[] = $element['name'];
            }

            $invalidNames = [];
            $count_invalid = 0;
            foreach ($stations as $index => $name) {
                $trimed_stations = trim($name);
                $station = Corsstation::where('name', $trimed_stations)->first();

                if (!empty($station)) {
                    $invalidNames[] = $index;
                    $count_invalid++;
                }
            }
            if (count($invalidNames) > 0) {
                $invalidNamesStr = implode(', ', array_map(function ($index) use ($stations) {
                    return '"' . $stations[$index] . '", at row ' . ($index + 2);
                }, $invalidNames));

                if (count($invalidNames) == 1) {
                    $errorMessage = "In Your Uploaded Sheet you have " . $count_invalid . " Stations which  EXIST in your system it have value" . $invalidNamesStr . " , of your Uploaded Excel sheet , make sure you Upload new Stations which does not Exists in your System";
                } else {
                    $errorMessage = "In Your Uploaded Sheet you have " . $count_invalid . " Stations which  EXIST in your system they have values of " . $invalidNamesStr . " , of your Uploaded Excel sheet ,  make sure you Upload new Stations which does not Exists in your System";
                }


                return redirect()->route('corsstations.create_excel')->with('error', $errorMessage);
                exit;
            }

            // end validate
            $station_count = 0;
            foreach ($data as  $value) {
                $corsstations = Corsstation::create($value);
                $station_count++;
            }
        } else {
            return redirect()->route('corsstations.create_excel')->with('error', $status);
        }
        if ($station_count > 0) {
            return redirect()->route('corsstations.index', $corsstations)->withSuccess($station_count . ' Station(s) added successfully');
        } else {
            return redirect()->route('corsstations.index')->with('error', 'No Station added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Corsstation $corsstation): View
    {
        $this->authorize('view', $corsstation);

        return view('app.corsstations.show', compact('corsstation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Corsstation $corsstation): View
    {
        $this->authorize('update', $corsstation);

        return view('app.corsstations.edit', compact('corsstation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CorsstationUpdateRequest $request,
        Corsstation $corsstation
    ): RedirectResponse {
        $this->authorize('update', $corsstation);

        $validated = $request->validated();

        $corsstation->update($validated);

        return redirect()
            ->route('corsstations.edit', $corsstation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Corsstation $corsstation
    ): RedirectResponse {
        $this->authorize('delete', $corsstation);

        $corsstation->delete();

        return redirect()
            ->route('corsstations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
