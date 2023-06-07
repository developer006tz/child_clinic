<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ComposeSms;
use Illuminate\Http\Request;
use App\Models\MessageTemplate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ComposeSmsStoreRequest;
use App\Http\Requests\ComposeSmsUpdateRequest;

class ComposeSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ComposeSms::class);

        $search = $request->get('search', '');

        $allComposeSms = ComposeSms::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.all_compose_sms.index',
            compact('allComposeSms', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ComposeSms::class);

        $messageTemplates = MessageTemplate::pluck('name', 'id');

        return view('app.all_compose_sms.create', compact('messageTemplates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComposeSmsStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ComposeSms::class);

        $validated = $request->validated();

        $composeSms = ComposeSms::create($validated);

        return redirect()
            ->route('all-compose-sms.index', $composeSms)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ComposeSms $composeSms): View
    {
        $this->authorize('view', $composeSms);

        return view('app.all_compose_sms.show', compact('composeSms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ComposeSms $composeSms): View
    {
        $this->authorize('update', $composeSms);

        $messageTemplates = MessageTemplate::pluck('name', 'id');

        return view(
            'app.all_compose_sms.edit',
            compact('composeSms', 'messageTemplates')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ComposeSmsUpdateRequest $request,
        ComposeSms $composeSms
    ): RedirectResponse {
        $this->authorize('update', $composeSms);

        $validated = $request->validated();

        $composeSms->update($validated);

        return redirect()
            ->route('all-compose-sms.index', $composeSms)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ComposeSms $composeSms
    ): RedirectResponse {
        $this->authorize('delete', $composeSms);

        $composeSms->delete();

        return redirect()
            ->route('all-compose-sms.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
