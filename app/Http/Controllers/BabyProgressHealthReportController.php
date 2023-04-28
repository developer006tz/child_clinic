<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\BabyProgressHealthReport;
use App\Http\Requests\BabyProgressHealthReportStoreRequest;
use App\Http\Requests\BabyProgressHealthReportUpdateRequest;

class BabyProgressHealthReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BabyProgressHealthReport::class);

        $search = $request->get('search', '');

        $babyProgressHealthReports = BabyProgressHealthReport::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.baby_progress_health_reports.index',
            compact('babyProgressHealthReports', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BabyProgressHealthReport::class);

        $babies = Baby::pluck('name', 'id');

        return view(
            'app.baby_progress_health_reports.create',
            compact('babies')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BabyProgressHealthReportStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', BabyProgressHealthReport::class);

        $validated = $request->validated();

        $babyProgressHealthReport = BabyProgressHealthReport::create(
            $validated
        );

        return redirect()
            ->route(
                'baby-progress-health-reports.edit',
                $babyProgressHealthReport
            )
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        BabyProgressHealthReport $babyProgressHealthReport
    ): View {
        $this->authorize('view', $babyProgressHealthReport);

        return view(
            'app.baby_progress_health_reports.show',
            compact('babyProgressHealthReport')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        BabyProgressHealthReport $babyProgressHealthReport
    ): View {
        $this->authorize('update', $babyProgressHealthReport);

        $babies = Baby::pluck('name', 'id');

        return view(
            'app.baby_progress_health_reports.edit',
            compact('babyProgressHealthReport', 'babies')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BabyProgressHealthReportStoreRequest $request,
        BabyProgressHealthReport $babyProgressHealthReport
    ): RedirectResponse {
        $this->authorize('update', $babyProgressHealthReport);

        $validated = $request->validated();

        $babyProgressHealthReport->update($validated);

        return redirect()
            ->route(
                'baby-progress-health-reports.edit',
                $babyProgressHealthReport
            )
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BabyProgressHealthReport $babyProgressHealthReport
    ): RedirectResponse {
        $this->authorize('delete', $babyProgressHealthReport);

        $babyProgressHealthReport->delete();

        return redirect()
            ->route('baby-progress-health-reports.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
