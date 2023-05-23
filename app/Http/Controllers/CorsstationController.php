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
