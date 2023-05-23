<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SystemDescription;
use App\Http\Controllers\Controller;
use App\Http\Resources\SystemDescriptionResource;
use App\Http\Resources\SystemDescriptionCollection;
use App\Http\Requests\SystemDescriptionStoreRequest;
use App\Http\Requests\SystemDescriptionUpdateRequest;

class SystemDescriptionController extends Controller
{
    public function index(Request $request): SystemDescriptionCollection
    {
        $this->authorize('view-any', SystemDescription::class);

        $search = $request->get('search', '');

        $systemDescriptions = SystemDescription::search($search)
            ->latest()
            ->paginate();

        return new SystemDescriptionCollection($systemDescriptions);
    }

    public function store(
        SystemDescriptionStoreRequest $request
    ): SystemDescriptionResource {
        $this->authorize('create', SystemDescription::class);

        $validated = $request->validated();

        $systemDescription = SystemDescription::create($validated);

        return new SystemDescriptionResource($systemDescription);
    }

    public function show(
        Request $request,
        SystemDescription $systemDescription
    ): SystemDescriptionResource {
        $this->authorize('view', $systemDescription);

        return new SystemDescriptionResource($systemDescription);
    }

    public function update(
        SystemDescriptionUpdateRequest $request,
        SystemDescription $systemDescription
    ): SystemDescriptionResource {
        $this->authorize('update', $systemDescription);

        $validated = $request->validated();

        $systemDescription->update($validated);

        return new SystemDescriptionResource($systemDescription);
    }

    public function destroy(
        Request $request,
        SystemDescription $systemDescription
    ): Response {
        $this->authorize('delete', $systemDescription);

        $systemDescription->delete();

        return response()->noContent();
    }
}
