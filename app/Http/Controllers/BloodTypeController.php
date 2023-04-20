<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BloodTypeStoreRequest;
use App\Http\Requests\BloodTypeUpdateRequest;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BloodType::class);

        $search = $request->get('search', '');

        $bloodTypes = BloodType::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.blood_types.index', compact('bloodTypes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BloodType::class);

        return view('app.blood_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BloodTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', BloodType::class);

        $validated = $request->validated();

        $bloodType = BloodType::create($validated);

        return redirect()
            ->route('blood-types.edit', $bloodType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, BloodType $bloodType): View
    {
        $this->authorize('view', $bloodType);

        return view('app.blood_types.show', compact('bloodType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, BloodType $bloodType): View
    {
        $this->authorize('update', $bloodType);

        return view('app.blood_types.edit', compact('bloodType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BloodTypeUpdateRequest $request,
        BloodType $bloodType
    ): RedirectResponse {
        $this->authorize('update', $bloodType);

        $validated = $request->validated();

        $bloodType->update($validated);

        return redirect()
            ->route('blood-types.edit', $bloodType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BloodType $bloodType
    ): RedirectResponse {
        $this->authorize('delete', $bloodType);

        $bloodType->delete();

        return redirect()
            ->route('blood-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
