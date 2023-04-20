<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Vacination;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\VacinationStoreRequest;
use App\Http\Requests\VacinationUpdateRequest;

class VacinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Vacination::class);

        $search = $request->get('search', '');

        $vacinations = Vacination::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.vacinations.index', compact('vacinations', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Vacination::class);

        return view('app.vacinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacinationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Vacination::class);

        $validated = $request->validated();

        $vacination = Vacination::create($validated);

        return redirect()
            ->route('vacinations.edit', $vacination)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Vacination $vacination): View
    {
        $this->authorize('view', $vacination);

        return view('app.vacinations.show', compact('vacination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Vacination $vacination): View
    {
        $this->authorize('update', $vacination);

        return view('app.vacinations.edit', compact('vacination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        VacinationStoreRequest $request,
        Vacination $vacination
    ): RedirectResponse {
        $this->authorize('update', $vacination);

        $validated = $request->validated();

        $vacination->update($validated);

        return redirect()
            ->route('vacinations.edit', $vacination)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Vacination $vacination
    ): RedirectResponse {
        $this->authorize('delete', $vacination);

        $vacination->delete();

        return redirect()
            ->route('vacinations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
