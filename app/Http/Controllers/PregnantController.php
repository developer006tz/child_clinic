<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use App\Models\Pregnant;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PregnantStoreRequest;
use App\Http\Requests\PregnantUpdateRequest;

class PregnantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Pregnant::class);

        $search = $request->get('search', '');

        $pregnants = Pregnant::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.pregnants.index', compact('pregnants', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Pregnant::class);

        $mothers = Mother::pluck('name', 'id');

        return view('app.pregnants.create', compact('mothers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PregnantStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Pregnant::class);

        $validated = $request->validated();

        $pregnant = Pregnant::create($validated);

        return redirect()
            ->route('pregnants.edit', $pregnant)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pregnant $pregnant): View
    {
        $this->authorize('view', $pregnant);

        return view('app.pregnants.show', compact('pregnant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pregnant $pregnant): View
    {
        $this->authorize('update', $pregnant);

        $mothers = Mother::pluck('name', 'id');

        return view('app.pregnants.edit', compact('pregnant', 'mothers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PregnantUpdateRequest $request,
        Pregnant $pregnant
    ): RedirectResponse {
        $this->authorize('update', $pregnant);

        $validated = $request->validated();

        $pregnant->update($validated);

        return redirect()
            ->route('pregnants.edit', $pregnant)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Pregnant $pregnant
    ): RedirectResponse {
        $this->authorize('delete', $pregnant);

        $pregnant->delete();

        return redirect()
            ->route('pregnants.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
