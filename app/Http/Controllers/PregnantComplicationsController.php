<?php

namespace App\Http\Controllers;

use App\Models\Pregnant;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PregnantComplications;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PregnantComplicationsStoreRequest;
use App\Http\Requests\PregnantComplicationsUpdateRequest;

class PregnantComplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', PregnantComplications::class);

        $search = $request->get('search', '');

        $allPregnantComplications = PregnantComplications::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.all_pregnant_complications.index',
            compact('allPregnantComplications', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', PregnantComplications::class);

        $pregnants = Pregnant::pluck('due_date', 'id');

        return view(
            'app.all_pregnant_complications.create',
            compact('pregnants')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        PregnantComplicationsStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', PregnantComplications::class);

        $validated = $request->validated();

        $pregnantComplications = PregnantComplications::create($validated);

        return redirect()
            ->route('all-pregnant-complications.index', $pregnantComplications)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        PregnantComplications $pregnantComplications
    ): View {
        $this->authorize('view', $pregnantComplications);

        return view(
            'app.all_pregnant_complications.show',
            compact('pregnantComplications')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        PregnantComplications $pregnantComplications
    ): View {
        $this->authorize('update', $pregnantComplications);

        $pregnants = Pregnant::pluck('due_date', 'id');

        return view(
            'app.all_pregnant_complications.edit',
            compact('pregnantComplications', 'pregnants')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PregnantComplicationsUpdateRequest $request,
        PregnantComplications $pregnantComplications
    ): RedirectResponse {
        $this->authorize('update', $pregnantComplications);

        $validated = $request->validated();

        $pregnantComplications->update($validated);

        return redirect()
            ->route('all-pregnant-complications.index', $pregnantComplications)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        PregnantComplications $pregnantComplications
    ): RedirectResponse {
        $this->authorize('delete', $pregnantComplications);

        $pregnantComplications->delete();

        return redirect()
            ->route('all-pregnant-complications.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
