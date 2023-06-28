<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use Illuminate\View\View;
use App\Models\BloodType;
use App\Models\Pregnant;
use App\Models\PrenatalApointment;
use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MotherStoreRequest;
use App\Http\Requests\MotherUpdateRequest;

class MotherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Mother::class);

        $search = $request->get('search', '');

        $mothers = Mother::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.mothers.index', compact('mothers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Mother::class);

        $bloodTypes = BloodType::pluck('name', 'id');

        return view('app.mothers.create', compact('bloodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotherStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Mother::class);

        $validated = $request->validated();

        $mother = Mother::create($validated);

        return redirect()
            ->route('mothers.index', $mother)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Mother $mother): View
    {
        $this->authorize('view', $mother);

        $pregnancies = Pregnant::where('mother_id', $mother->id)->get();
        $father = $mother->father;
        if(!empty($pregnancies)){
            foreach ($pregnancies as $key => $pregnancy) {
                $pregnancy_appointments= PrenatalApointment::where('pregnant_id', $pregnancy->id)->get();
            }
            if(!empty($pregnancy_appointments)){
                foreach ($pregnancy_appointments as $key => $pregnancy_appointment) {
                    $sms = Sms::where('pregnant_id', $pregnancy_appointment->pregnant_id)->get();
                }
                return view('app.mothers.show', compact('mother', 'father', 'pregnancies', 'pregnancy_appointments'));

            }else{
                return view('app.mothers.show', compact('mother', 'father', 'pregnancies'));
            }
        }
        return view('app.mothers.show', compact('mother', 'father'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Mother $mother): View
    {
        $this->authorize('update', $mother);

        $bloodTypes = BloodType::pluck('name', 'id');

        return view('app.mothers.edit', compact('mother', 'bloodTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MotherStoreRequest $request,
        Mother $mother
    ): RedirectResponse {
        $this->authorize('update', $mother);

        $validated = $request->validated();

        $mother->update($validated);

        return redirect()
            ->route('mothers.index', $mother)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Mother $mother): RedirectResponse
    {
        $this->authorize('delete', $mother);

        $mother->delete();

        return redirect()
            ->route('mothers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
