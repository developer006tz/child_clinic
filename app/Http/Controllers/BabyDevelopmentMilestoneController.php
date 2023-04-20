<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\BabyDevelopmentMilestone;
use App\Http\Requests\BabyDevelopmentMilestoneStoreRequest;
use App\Http\Requests\BabyDevelopmentMilestoneUpdateRequest;

class BabyDevelopmentMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BabyDevelopmentMilestone::class);

        $search = $request->get('search', '');

        $babyDevelopmentMilestones = BabyDevelopmentMilestone::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();
        /*foreach ($babyDevelopmentMilestones as $test){
            dd($test->baby->name);
        }*/
        return view(
            'app.baby_development_milestones.index',
            compact('babyDevelopmentMilestones', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BabyDevelopmentMilestone::class);

        $babies = Baby::pluck('name', 'id');

        return view(
            'app.baby_development_milestones.create',
            compact('babies')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BabyDevelopmentMilestoneStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', BabyDevelopmentMilestone::class);

        $validated = $request->validated();

        $babyDevelopmentMilestone = BabyDevelopmentMilestone::create(
            $validated
        );

        return redirect()
            ->route(
                'baby-development-milestones.edit',
                $babyDevelopmentMilestone
            )
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        BabyDevelopmentMilestone $babyDevelopmentMilestone
    ): View {
        $this->authorize('view', $babyDevelopmentMilestone);

        return view(
            'app.baby_development_milestones.show',
            compact('babyDevelopmentMilestone')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        BabyDevelopmentMilestone $babyDevelopmentMilestone
    ): View {
        $this->authorize('update', $babyDevelopmentMilestone);

        $babies = Baby::pluck('name', 'id');

        return view(
            'app.baby_development_milestones.edit',
            compact('babyDevelopmentMilestone', 'babies')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BabyDevelopmentMilestoneUpdateRequest $request,
        BabyDevelopmentMilestone $babyDevelopmentMilestone
    ): RedirectResponse {
        $this->authorize('update', $babyDevelopmentMilestone);

        $validated = $request->validated();

        $babyDevelopmentMilestone->update($validated);

        return redirect()
            ->route(
                'baby-development-milestones.edit',
                $babyDevelopmentMilestone
            )
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BabyDevelopmentMilestone $babyDevelopmentMilestone
    ): RedirectResponse {
        $this->authorize('delete', $babyDevelopmentMilestone);

        $babyDevelopmentMilestone->delete();

        return redirect()
            ->route('baby-development-milestones.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
