<?php

namespace App\Http\Controllers;

use App\Models\Pregnant;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PrenatalApointment;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PrenatalApointmentStoreRequest;
use App\Http\Requests\PrenatalApointmentUpdateRequest;

class PrenatalApointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', PrenatalApointment::class);

        $search = $request->get('search', '');

        $prenatalApointments = PrenatalApointment::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.prenatal_apointments.index',
            compact('prenatalApointments', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', PrenatalApointment::class);

        $pregnants = Pregnant::pluck('due_date', 'id');

        return view('app.prenatal_apointments.create', compact('pregnants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        PrenatalApointmentStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', PrenatalApointment::class);

        $validated = $request->validated();

        $prenatalApointment = PrenatalApointment::create($validated);

        return redirect()
            ->route('prenatal-apointments.edit', $prenatalApointment)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        PrenatalApointment $prenatalApointment
    ): View {
        $this->authorize('view', $prenatalApointment);

        return view(
            'app.prenatal_apointments.show',
            compact('prenatalApointment')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        PrenatalApointment $prenatalApointment
    ): View {
        $this->authorize('update', $prenatalApointment);

        $pregnants = Pregnant::pluck('due_date', 'id');

        return view(
            'app.prenatal_apointments.edit',
            compact('prenatalApointment', 'pregnants')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PrenatalApointmentUpdateRequest $request,
        PrenatalApointment $prenatalApointment
    ): RedirectResponse {
        $this->authorize('update', $prenatalApointment);

        $validated = $request->validated();

        $prenatalApointment->update($validated);

        return redirect()
            ->route('prenatal-apointments.edit', $prenatalApointment)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        PrenatalApointment $prenatalApointment
    ): RedirectResponse {
        $this->authorize('delete', $prenatalApointment);

        $prenatalApointment->delete();

        return redirect()
            ->route('prenatal-apointments.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
