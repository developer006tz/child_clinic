<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ClinicStoreRequest;
use App\Http\Requests\ClinicUpdateRequest;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Clinic::class);

        $search = $request->get('search', '');

        $clinics = Clinic::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.clinics.index', compact('clinics', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Clinic::class);

        return view('app.clinics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinicStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Clinic::class);

        $validated = $request->validated();

        $clinic = Clinic::create($validated);

        return redirect()
            ->route('clinics.index', $clinic)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Clinic $clinic): View
    {
        $this->authorize('view', $clinic);

        return view('app.clinics.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Clinic $clinic): View
    {
        $this->authorize('update', $clinic);

        return view('app.clinics.edit', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ClinicUpdateRequest $request,
        Clinic $clinic
    ): RedirectResponse {
        $this->authorize('update', $clinic);

        $validated = $request->validated();

        $clinic->update($validated);

        return redirect()
            ->route('clinics.index', $clinic)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Clinic $clinic): RedirectResponse
    {
        $this->authorize('delete', $clinic);

        $clinic->delete();

        return redirect()
            ->route('clinics.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
