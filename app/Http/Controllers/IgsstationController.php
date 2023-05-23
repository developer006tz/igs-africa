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
