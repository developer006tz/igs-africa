<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\SystemDescription;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SystemDescriptionStoreRequest;
use App\Http\Requests\SystemDescriptionUpdateRequest;

class SystemDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', SystemDescription::class);

        $search = $request->get('search', '');

        $systemDescriptions = SystemDescription::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.system_descriptions.index',
            compact('systemDescriptions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', SystemDescription::class);

        $users = User::pluck('name', 'id');

        return view('app.system_descriptions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        SystemDescriptionStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', SystemDescription::class);

        $validated = $request->validated();

        $systemDescription = SystemDescription::create($validated);

        return redirect()
            ->route('system-descriptions.edit', $systemDescription)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        SystemDescription $systemDescription
    ): View {
        $this->authorize('view', $systemDescription);

        return view(
            'app.system_descriptions.show',
            compact('systemDescription')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        SystemDescription $systemDescription
    ): View {
        $this->authorize('update', $systemDescription);

        $users = User::pluck('name', 'id');

        return view(
            'app.system_descriptions.edit',
            compact('systemDescription', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SystemDescriptionUpdateRequest $request,
        SystemDescription $systemDescription
    ): RedirectResponse {
        $this->authorize('update', $systemDescription);

        $validated = $request->validated();

        $systemDescription->update($validated);

        return redirect()
            ->route('system-descriptions.edit', $systemDescription)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        SystemDescription $systemDescription
    ): RedirectResponse {
        $this->authorize('delete', $systemDescription);

        $systemDescription->delete();

        return redirect()
            ->route('system-descriptions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
