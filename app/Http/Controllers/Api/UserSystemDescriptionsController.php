<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SystemDescriptionResource;
use App\Http\Resources\SystemDescriptionCollection;

class UserSystemDescriptionsController extends Controller
{
    public function index(
        Request $request,
        User $user
    ): SystemDescriptionCollection {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $systemDescriptions = $user
            ->systemDescriptions()
            ->search($search)
            ->latest()
            ->paginate();

        return new SystemDescriptionCollection($systemDescriptions);
    }

    public function store(
        Request $request,
        User $user
    ): SystemDescriptionResource {
        $this->authorize('create', SystemDescription::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'other' => ['nullable', 'max:255', 'string'],
        ]);

        $systemDescription = $user->systemDescriptions()->create($validated);

        return new SystemDescriptionResource($systemDescription);
    }
}
