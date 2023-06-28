<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use App\Models\Mother;
use App\Models\Father;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BabyStoreRequest;
use App\Http\Requests\BabyUpdateRequest;

class BabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Baby::class);

        $search = $request->get('search', '');

        if($request->user()->hasRole('super-admin')){
            $babies = Baby::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        }else{
            $mother = Mother::where('user_id', $request->user()->id)->first();
            $babies = Baby::search($search)
            ->where('mother_id', $mother->id)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        }

        return view('app.babies.index', compact('babies', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Baby::class);

        $mothers = Mother::pluck('name', 'id');
        $fathers = Father::pluck('name', 'id');

        return view('app.babies.create', compact('mothers', 'fathers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BabyStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Baby::class);

        $validated = $request->validated();

        $baby = Baby::create($validated);

        return redirect()
            ->route('babies.show', $baby)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Baby $baby): View
    {
        $this->authorize('view', $baby);

        return view('app.babies.show', compact('baby'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Baby $baby): View
    {
        $this->authorize('update', $baby);

        $mothers = Mother::pluck('name', 'id');
        $fathers = Father::pluck('name', 'id');

        return view('app.babies.edit', compact('baby', 'mothers', 'fathers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BabyStoreRequest $request,
        Baby $baby
    ): RedirectResponse {
        $this->authorize('update', $baby);

        $validated = $request->validated();

        $baby->update($validated);

        return redirect()
            ->route('babies.show', $baby)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Baby $baby): RedirectResponse
    {
        $this->authorize('delete', $baby);

        $baby->delete();

        return redirect()
            ->route('babies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
