<?php

namespace App\Http\Controllers;

use App\Models\Father;
use App\Models\Mother;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FatherStoreRequest;
use App\Http\Requests\FatherUpdateRequest;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Father::class);

        $search = $request->get('search', '');

        $fathers = Father::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.fathers.index', compact('fathers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Father::class);

        $mothers = Mother::pluck('name', 'id');

        return view('app.fathers.create', compact('mothers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FatherStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Father::class);

        $validated = $request->validated();

        $father = Father::create($validated);

        return redirect()
            ->route('fathers.edit', $father)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Father $father): View
    {
        $this->authorize('view', $father);

        return view('app.fathers.show', compact('father'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Father $father): View
    {
        $this->authorize('update', $father);

        $mothers = Mother::pluck('name', 'id');

        return view('app.fathers.edit', compact('father', 'mothers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FatherUpdateRequest $request,
        Father $father
    ): RedirectResponse {
        $this->authorize('update', $father);

        $validated = $request->validated();

        $father->update($validated);

        return redirect()
            ->route('fathers.edit', $father)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Father $father): RedirectResponse
    {
        $this->authorize('delete', $father);

        $father->delete();

        return redirect()
            ->route('fathers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
