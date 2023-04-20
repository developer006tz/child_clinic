<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use App\Models\Mother;
use App\Models\Father;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BirthCertificate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BirthCertificateStoreRequest;
use App\Http\Requests\BirthCertificateUpdateRequest;

class BirthCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BirthCertificate::class);

        $search = $request->get('search', '');

        $birthCertificates = BirthCertificate::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view(
            'app.birth_certificates.index',
            compact('birthCertificates', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BirthCertificate::class);

        $babies = Baby::pluck('name', 'id');
        $mothers = Mother::pluck('name', 'id');
        $fathers = Father::pluck('name', 'id');

        return view(
            'app.birth_certificates.create',
            compact('babies', 'mothers', 'fathers')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BirthCertificateStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', BirthCertificate::class);

        $validated = $request->validated();

        $birthCertificate = BirthCertificate::create($validated);

        return redirect()
            ->route('birth-certificates.edit', $birthCertificate)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        BirthCertificate $birthCertificate
    ): View {
        $this->authorize('view', $birthCertificate);

        return view('app.birth_certificates.show', compact('birthCertificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        BirthCertificate $birthCertificate
    ): View {
        $this->authorize('update', $birthCertificate);

        $babies = Baby::pluck('name', 'id');
        $mothers = Mother::pluck('name', 'id');
        $fathers = Father::pluck('name', 'id');

        return view(
            'app.birth_certificates.edit',
            compact('birthCertificate', 'babies', 'mothers', 'fathers')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BirthCertificateUpdateRequest $request,
        BirthCertificate $birthCertificate
    ): RedirectResponse {
        $this->authorize('update', $birthCertificate);

        $validated = $request->validated();

        $birthCertificate->update($validated);

        return redirect()
            ->route('birth-certificates.edit', $birthCertificate)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BirthCertificate $birthCertificate
    ): RedirectResponse {
        $this->authorize('delete', $birthCertificate);

        $birthCertificate->delete();

        return redirect()
            ->route('birth-certificates.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
