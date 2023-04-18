<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\MessageTemplate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MessageTemplateStoreRequest;
use App\Http\Requests\MessageTemplateUpdateRequest;

class MessageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', MessageTemplate::class);

        $search = $request->get('search', '');

        $messageTemplates = MessageTemplate::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.message_templates.index',
            compact('messageTemplates', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', MessageTemplate::class);

        return view('app.message_templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        MessageTemplateStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', MessageTemplate::class);

        $validated = $request->validated();

        $messageTemplate = MessageTemplate::create($validated);

        return redirect()
            ->route('message-templates.edit', $messageTemplate)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        MessageTemplate $messageTemplate
    ): View {
        $this->authorize('view', $messageTemplate);

        return view('app.message_templates.show', compact('messageTemplate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        MessageTemplate $messageTemplate
    ): View {
        $this->authorize('update', $messageTemplate);

        return view('app.message_templates.edit', compact('messageTemplate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MessageTemplateUpdateRequest $request,
        MessageTemplate $messageTemplate
    ): RedirectResponse {
        $this->authorize('update', $messageTemplate);

        $validated = $request->validated();

        $messageTemplate->update($validated);

        return redirect()
            ->route('message-templates.edit', $messageTemplate)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        MessageTemplate $messageTemplate
    ): RedirectResponse {
        $this->authorize('delete', $messageTemplate);

        $messageTemplate->delete();

        return redirect()
            ->route('message-templates.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
