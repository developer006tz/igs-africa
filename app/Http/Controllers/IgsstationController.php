<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Igsstation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\IgsstationStoreRequest;
use App\Http\Requests\IgsstationUpdateRequest;

class IgsstationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Igsstation::class);

        $search = $request->get('search', '');

        $igsstations = Igsstation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.igsstations.index', compact('igsstations', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Igsstation::class);

        return view('app.igsstations.create');
    }

    public function create_excel(Request $request): View
    {
        $this->authorize('create', Igsstation::class);

        return view('app.igsstations.create-excel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IgsstationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Igsstation::class);

        $validated = $request->validated();

        $igsstation = Igsstation::create($validated);

        return redirect()
            ->route('igsstations.edit', $igsstation)
            ->withSuccess(__('crud.common.created'));
    }

   public function store_excel(Request $request): RedirectResponse{
        $this->authorize('create', Igsstation::class);

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
                $station = Igsstation::where('name', $trimed_stations)->first();

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


                return redirect()->route('igsstations.create_excel')->with('error', $errorMessage);
                exit;
            }

            // end validate
            $station_count = 0;
            foreach ($data as  $value) {
                $igsstation= Igsstation::create($value);
                $station_count++;
            }
        } else {
            return redirect()->route('igsstations.create_excel')->with('error', $status);
        }
        if ($station_count > 0) {
            return redirect()->route('igsstations.index', $igsstation)->withSuccess($station_count . ' Station(s) added successfully');
        } else {
            return redirect()->route('igsstations.index')->with('error', 'No Station added');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, Igsstation $igsstation): View
    {
        $this->authorize('view', $igsstation);

        return view('app.igsstations.show', compact('igsstation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Igsstation $igsstation): View
    {
        $this->authorize('update', $igsstation);

        return view('app.igsstations.edit', compact('igsstation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        IgsstationUpdateRequest $request,
        Igsstation $igsstation
    ): RedirectResponse {
        $this->authorize('update', $igsstation);

        $validated = $request->validated();

        $igsstation->update($validated);

        return redirect()
            ->route('igsstations.edit', $igsstation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Igsstation $igsstation
    ): RedirectResponse {
        $this->authorize('delete', $igsstation);

        $igsstation->delete();

        return redirect()
            ->route('igsstations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
