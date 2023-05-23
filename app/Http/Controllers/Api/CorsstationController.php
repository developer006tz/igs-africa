<?php

namespace App\Http\Controllers\Api;

use App\Models\Corsstation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CorsstationResource;
use App\Http\Resources\CorsstationCollection;
use App\Http\Requests\CorsstationStoreRequest;
use App\Http\Requests\CorsstationUpdateRequest;

class CorsstationController extends Controller
{
    public function index(Request $request): CorsstationCollection
    {
        $this->authorize('view-any', Corsstation::class);

        $search = $request->get('search', '');

        $corsstations = Corsstation::search($search)
            ->latest()
            ->paginate();

        return new CorsstationCollection($corsstations);
    }

    public function store(CorsstationStoreRequest $request): CorsstationResource
    {
        $this->authorize('create', Corsstation::class);

        $validated = $request->validated();

        $corsstation = Corsstation::create($validated);

        return new CorsstationResource($corsstation);
    }

    public function show(
        Request $request,
        Corsstation $corsstation
    ): CorsstationResource {
        $this->authorize('view', $corsstation);

        return new CorsstationResource($corsstation);
    }

    public function update(
        CorsstationUpdateRequest $request,
        Corsstation $corsstation
    ): CorsstationResource {
        $this->authorize('update', $corsstation);

        $validated = $request->validated();

        $corsstation->update($validated);

        return new CorsstationResource($corsstation);
    }

    public function destroy(
        Request $request,
        Corsstation $corsstation
    ): Response {
        $this->authorize('delete', $corsstation);

        $corsstation->delete();

        return response()->noContent();
    }
}
