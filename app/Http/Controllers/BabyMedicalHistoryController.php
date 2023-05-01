<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use App\Models\Desease;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BabyMedicalHistory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BabyMedicalHistoryStoreRequest;
use App\Http\Requests\BabyMedicalHistoryUpdateRequest;

class BabyMedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BabyMedicalHistory::class);

        $search = $request->get('search', '');

        $babyMedicalHistories = BabyMedicalHistory::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.baby_medical_histories.index',
            compact('babyMedicalHistories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BabyMedicalHistory::class);

        $deseases = Desease::pluck('name', 'id');
        $baby = Baby::pluck('name', 'id');

        return view('app.baby_medical_histories.create', compact('deseases','baby'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BabyMedicalHistoryStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', BabyMedicalHistory::class);

        $validated = $request->validated();

        $babyMedicalHistory = BabyMedicalHistory::create($validated);

        return redirect()
            ->route('baby-medical-histories.edit', $babyMedicalHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        BabyMedicalHistory $babyMedicalHistory
    ): View {
        $this->authorize('view', $babyMedicalHistory);

        return view(
            'app.baby_medical_histories.show',
            compact('babyMedicalHistory')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        BabyMedicalHistory $babyMedicalHistory
    ): View {
        $this->authorize('update', $babyMedicalHistory);

        $deseases = Desease::pluck('name', 'id');
        $baby = Baby::pluck('name','id');

        return view(
            'app.baby_medical_histories.edit',
            compact('babyMedicalHistory', 'deseases','baby')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BabyMedicalHistoryStoreRequest $request,
        BabyMedicalHistory $babyMedicalHistory
    ): RedirectResponse {
        $this->authorize('update', $babyMedicalHistory);

        $validated = $request->validated();

        $babyMedicalHistory->update($validated);

        return redirect()
            ->route('baby-medical-histories.edit', $babyMedicalHistory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BabyMedicalHistory $babyMedicalHistory
    ): RedirectResponse {
        $this->authorize('delete', $babyMedicalHistory);

        $babyMedicalHistory->delete();

        return redirect()
            ->route('baby-medical-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
