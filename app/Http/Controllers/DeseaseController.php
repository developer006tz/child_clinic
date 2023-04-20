<?php

namespace App\Http\Controllers;

use App\Models\Desease;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DeseaseStoreRequest;
use App\Http\Requests\DeseaseUpdateRequest;

class DeseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Desease::class);

        $search = $request->get('search', '');

        $deseases = Desease::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.deseases.index', compact('deseases', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Desease::class);

        return view('app.deseases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeseaseStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Desease::class);

        $validated = $request->validated();

        $desease = Desease::create($validated);

        return redirect()
            ->route('deseases.edit', $desease)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Desease $desease): View
    {
        $this->authorize('view', $desease);

        return view('app.deseases.show', compact('desease'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Desease $desease): View
    {
        $this->authorize('update', $desease);

        return view('app.deseases.edit', compact('desease'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DeseaseUpdateRequest $request,
        Desease $desease
    ): RedirectResponse {
        $this->authorize('update', $desease);

        $validated = $request->validated();

        $desease->update($validated);

        return redirect()
            ->route('deseases.edit', $desease)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Desease $desease
    ): RedirectResponse {
        $this->authorize('delete', $desease);

        $desease->delete();

        return redirect()
            ->route('deseases.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
