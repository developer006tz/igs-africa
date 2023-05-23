<?php

namespace App\Http\Controllers\Api;

use App\Models\Igsstation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\IgsstationResource;
use App\Http\Resources\IgsstationCollection;
use App\Http\Requests\IgsstationStoreRequest;
use App\Http\Requests\IgsstationUpdateRequest;

class IgsstationController extends Controller
{
    public function index(Request $request): IgsstationCollection
    {
        $this->authorize('view-any', Igsstation::class);

        $search = $request->get('search', '');

        $igsstations = Igsstation::search($search)
            ->latest()
            ->paginate();

        return new IgsstationCollection($igsstations);
    }

    public function store(IgsstationStoreRequest $request): IgsstationResource
    {
        $this->authorize('create', Igsstation::class);

        $validated = $request->validated();

        $igsstation = Igsstation::create($validated);

        return new IgsstationResource($igsstation);
    }

    public function show(
        Request $request,
        Igsstation $igsstation
    ): IgsstationResource {
        $this->authorize('view', $igsstation);

        return new IgsstationResource($igsstation);
    }

    public function update(
        IgsstationUpdateRequest $request,
        Igsstation $igsstation
    ): IgsstationResource {
        $this->authorize('update', $igsstation);

        $validated = $request->validated();

        $igsstation->update($validated);

        return new IgsstationResource($igsstation);
    }

    public function destroy(Request $request, Igsstation $igsstation): Response
    {
        $this->authorize('delete', $igsstation);

        $igsstation->delete();

        return response()->noContent();
    }
}
