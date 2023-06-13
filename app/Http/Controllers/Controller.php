<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\View\View;
use App\Models\Corsstation;
use App\Models\Igsstation;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function igsstations(): View
    {
        $stations = getStations();

        return view('igsstations', $stations);
    }

    public function corsstations(): View
    {
        $stations = getStations();

        return view('corsstations', $stations);
    }
}
