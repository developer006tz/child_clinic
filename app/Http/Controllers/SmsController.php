<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SmsStoreRequest;
use App\Http\Requests\SmsUpdateRequest;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Sms::class);

        $search = $request->get('search', '');

        $allSms = Sms::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.all_sms.index', compact('allSms', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Sms::class);

        return view('app.all_sms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SmsStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Sms::class);

        $validated = $request->validated();

        $sms = Sms::create($validated);

        return redirect()
            ->route('all-sms.edit', $sms)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Sms $sms): View
    {
        $this->authorize('view', $sms);

        return view('app.all_sms.show', compact('sms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Sms $sms): View
    {
        $this->authorize('update', $sms);

        return view('app.all_sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SmsUpdateRequest $request,
        Sms $sms
    ): RedirectResponse {
        $this->authorize('update', $sms);

        $validated = $request->validated();

        $sms->update($validated);

        return redirect()
            ->route('all-sms.edit', $sms)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Sms $sms): RedirectResponse
    {
        $this->authorize('delete', $sms);

        $sms->delete();

        return redirect()
            ->route('all-sms.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
