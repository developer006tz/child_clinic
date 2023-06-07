<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\MotherMedicalHistory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MotherMedicalHistoryStoreRequest;
use App\Http\Requests\MotherMedicalHistoryUpdateRequest;

class MotherMedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', MotherMedicalHistory::class);

        $search = $request->get('search', '');

        $motherMedicalHistories = MotherMedicalHistory::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.mother_medical_histories.index',
            compact('motherMedicalHistories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', MotherMedicalHistory::class);

        $mothers = Mother::pluck('name', 'id');

        return view('app.mother_medical_histories.create', compact('mothers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        MotherMedicalHistoryStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', MotherMedicalHistory::class);

        $validated = $request->validated();

        $motherMedicalHistory = MotherMedicalHistory::create($validated);

        return redirect()
            ->route('mother-medical-histories.index', $motherMedicalHistory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        MotherMedicalHistory $motherMedicalHistory
    ): View {
        $this->authorize('view', $motherMedicalHistory);

        return view(
            'app.mother_medical_histories.show',
            compact('motherMedicalHistory')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        MotherMedicalHistory $motherMedicalHistory
    ): View {
        $this->authorize('update', $motherMedicalHistory);

        $mothers = Mother::pluck('name', 'id');

        return view(
            'app.mother_medical_histories.edit',
            compact('motherMedicalHistory', 'mothers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MotherMedicalHistoryStoreRequest $request,
        MotherMedicalHistory $motherMedicalHistory
    ): RedirectResponse {
        $this->authorize('update', $motherMedicalHistory);

        $validated = $request->validated();

        $motherMedicalHistory->update($validated);

        return redirect()
            ->route('mother-medical-histories.index', $motherMedicalHistory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        MotherMedicalHistory $motherMedicalHistory
    ): RedirectResponse {
        $this->authorize('delete', $motherMedicalHistory);

        $motherMedicalHistory->delete();

        return redirect()
            ->route('mother-medical-histories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
