<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use Illuminate\View\View;
use App\Models\Vacination;
use Illuminate\Http\Request;
use App\Models\BabyVaccination;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BabyVaccinationStoreRequest;
use App\Http\Requests\BabyVaccinationUpdateRequest;

class BabyVaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BabyVaccination::class);

        $search = $request->get('search', '');

        $babyVaccinations = BabyVaccination::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.baby_vaccinations.index',
            compact('babyVaccinations', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BabyVaccination::class);

        $babies = Baby::pluck('name', 'id');
        $vacinations = Vacination::pluck('name', 'id');

        return view(
            'app.baby_vaccinations.create',
            compact('babies', 'vacinations')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BabyVaccinationStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', BabyVaccination::class);

        $validated = $request->validated();

        BabyVaccination::create($validated);

        $baby = Baby::find($request->baby_id);
        return redirect()
            ->route(
                'babies.show',
                $baby
            )
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        BabyVaccination $babyVaccination
    ): View {
        $this->authorize('view', $babyVaccination);

        return view('app.baby_vaccinations.show', compact('babyVaccination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        BabyVaccination $babyVaccination
    ): View {
        $this->authorize('update', $babyVaccination);

        $babies = Baby::pluck('name', 'id');
        $vacinations = Vacination::pluck('name', 'id');

        return view(
            'app.baby_vaccinations.edit',
            compact('babyVaccination', 'babies', 'vacinations')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BabyVaccinationStoreRequest $request,
        BabyVaccination $babyVaccination
    ): RedirectResponse {
        $this->authorize('update', $babyVaccination);

        $validated = $request->validated();

        $babyVaccination->update($validated);

        return redirect()
            ->route('baby-vaccinations.index', $babyVaccination)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BabyVaccination $babyVaccination
    ): RedirectResponse {
        $this->authorize('delete', $babyVaccination);

        $babyVaccination->delete();

        return redirect()
            ->route('baby-vaccinations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
