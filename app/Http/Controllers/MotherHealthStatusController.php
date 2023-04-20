<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use App\Models\Desease;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\MotherHealthStatus;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MotherHealthStatusStoreRequest;
use App\Http\Requests\MotherHealthStatusUpdateRequest;

class MotherHealthStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', MotherHealthStatus::class);

        $search = $request->get('search', '');

        $motherHealthStatuses = MotherHealthStatus::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.mother_health_statuses.index',
            compact('motherHealthStatuses', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', MotherHealthStatus::class);

        $mothers = Mother::pluck('name', 'id');
        $deseases = Desease::pluck('name', 'id');

        return view(
            'app.mother_health_statuses.create',
            compact('mothers', 'deseases')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        MotherHealthStatusStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', MotherHealthStatus::class);

        $validated = $request->validated();

        $motherHealthStatus = MotherHealthStatus::create($validated);

        return redirect()
            ->route('mother-health-statuses.edit', $motherHealthStatus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        MotherHealthStatus $motherHealthStatus
    ): View {
        $this->authorize('view', $motherHealthStatus);

        return view(
            'app.mother_health_statuses.show',
            compact('motherHealthStatus')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        MotherHealthStatus $motherHealthStatus
    ): View {
        $this->authorize('update', $motherHealthStatus);

        $mothers = Mother::pluck('name', 'id');
        $deseases = Desease::pluck('name', 'id');

        return view(
            'app.mother_health_statuses.edit',
            compact('motherHealthStatus', 'mothers', 'deseases')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MotherHealthStatusStoreRequest $request,
        MotherHealthStatus $motherHealthStatus
    ): RedirectResponse {
        $this->authorize('update', $motherHealthStatus);

        $validated = $request->validated();

        $motherHealthStatus->update($validated);

        return redirect()
            ->route('mother-health-statuses.edit', $motherHealthStatus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        MotherHealthStatus $motherHealthStatus
    ): RedirectResponse {
        $this->authorize('delete', $motherHealthStatus);

        $motherHealthStatus->delete();

        return redirect()
            ->route('mother-health-statuses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
