<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\InsuranceStoreRequest;
use App\Http\Requests\InsuranceUpdateRequest;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Insurance::class);

        $search = $request->get('search', '');

        $insurances = Insurance::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.insurances.index', compact('insurances', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Insurance::class);

        return view('app.insurances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Insurance::class);

        $validated = $request->validated();

        $insurance = Insurance::create($validated);

        return redirect()
            ->route('insurances.edit', $insurance)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Insurance $insurance): View
    {
        $this->authorize('view', $insurance);

        return view('app.insurances.show', compact('insurance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Insurance $insurance): View
    {
        $this->authorize('update', $insurance);

        return view('app.insurances.edit', compact('insurance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        InsuranceUpdateRequest $request,
        Insurance $insurance
    ): RedirectResponse {
        $this->authorize('update', $insurance);

        $validated = $request->validated();

        $insurance->update($validated);

        return redirect()
            ->route('insurances.edit', $insurance)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Insurance $insurance
    ): RedirectResponse {
        $this->authorize('delete', $insurance);

        $insurance->delete();

        return redirect()
            ->route('insurances.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
