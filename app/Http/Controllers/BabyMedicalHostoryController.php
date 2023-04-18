<?php

namespace App\Http\Controllers;

use App\Models\Desease;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BabyMedicalHostory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BabyMedicalHostoryStoreRequest;
use App\Http\Requests\BabyMedicalHostoryUpdateRequest;

class BabyMedicalHostoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BabyMedicalHostory::class);

        $search = $request->get('search', '');

        $babyMedicalHostories = BabyMedicalHostory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.baby_medical_hostories.index',
            compact('babyMedicalHostories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BabyMedicalHostory::class);

        $deseases = Desease::pluck('name', 'id');

        return view('app.baby_medical_hostories.create', compact('deseases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BabyMedicalHostoryStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', BabyMedicalHostory::class);

        $validated = $request->validated();

        $babyMedicalHostory = BabyMedicalHostory::create($validated);

        return redirect()
            ->route('baby-medical-hostories.edit', $babyMedicalHostory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        BabyMedicalHostory $babyMedicalHostory
    ): View {
        $this->authorize('view', $babyMedicalHostory);

        return view(
            'app.baby_medical_hostories.show',
            compact('babyMedicalHostory')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        BabyMedicalHostory $babyMedicalHostory
    ): View {
        $this->authorize('update', $babyMedicalHostory);

        $deseases = Desease::pluck('name', 'id');

        return view(
            'app.baby_medical_hostories.edit',
            compact('babyMedicalHostory', 'deseases')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BabyMedicalHostoryUpdateRequest $request,
        BabyMedicalHostory $babyMedicalHostory
    ): RedirectResponse {
        $this->authorize('update', $babyMedicalHostory);

        $validated = $request->validated();

        $babyMedicalHostory->update($validated);

        return redirect()
            ->route('baby-medical-hostories.edit', $babyMedicalHostory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BabyMedicalHostory $babyMedicalHostory
    ): RedirectResponse {
        $this->authorize('delete', $babyMedicalHostory);

        $babyMedicalHostory->delete();

        return redirect()
            ->route('baby-medical-hostories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
