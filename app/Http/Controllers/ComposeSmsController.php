<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ComposeSms;
use Illuminate\Http\Request;
use App\Models\Mother;
use App\Models\MotherSchedules;
use App\Models\Schedule;
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

        $mothers = Mother::pluck('name', 'id');
        $schedules = Schedule::pluck('name', 'id');

        return view('app.all_compose_sms.create', compact('mothers', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', ComposeSms::class);

        if($request->schedule_id != null){
            if($request->attendance != null){
                $mothers = MotherSchedules::where('schedule_id', $request->schedule_id)->where('status','0')->get();
                //fetch phone nember of each mother and send sms to her
                if (count($mothers) > 0) {
                    foreach ($mothers as $mother) {
                        $mother_phone = Mother::where('id', $mother->mother_id)->first()->phone;
                        $phone = validatePhoneNumber($mother_phone);
                        $message = $request->custom_message;
                        //send sms
                        try {
                            $sms = beem_sms($phone, $message);
                            save_sms($message, $phone, $sms);
                        } catch (\Throwable $th) {
                            $th->getMessage();

                        }
                    }
                    return redirect()->back()->with('success', 'SMS sent successfully');
                }else{
                    return redirect()->back()->with('error', 'No mothers found for this schedule');
                }
            }else{
                if (!empty($request->mother_id)) {
                    $mothers = MotherSchedules::where('schedule_id', $request->schedule_id)->where('mother_id', $request->mother_id)->get();
                    //fetch phone nember of each mother and send sms to her
                    if (count($mothers) > 0) {
                        foreach ($mothers as $mother) {
                            $mother_phone = Mother::where('id', $mother->mother_id)->first()->phone;
                            $phone = validatePhoneNumber($mother_phone);
                            $message = $request->custom_message;
                            //send sms
                            try {
                                $sms = beem_sms($phone, $message);
                                save_sms($message, $phone, $sms);
                            } catch (\Throwable $th) {
                                $th->getMessage();

                            }
                        }
                        return redirect()->back()->with('success', 'SMS sent successfully');
                    }else{
                        return redirect()->back()->with('error', 'No mothers found for this schedule');
                    }
                 
                }else{
             $mothers = MotherSchedules::where('schedule_id', $request->schedule_id)->get();
            
            if(count($mothers)>0){
                foreach($mothers as $mother){
                $mother_phone = Mother::where('id', $mother->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother_phone);
                $message = $request->custom_message;
                //send sms
                try {
                    $sms = beem_sms($phone, $message);
                    save_sms($message, $phone, $sms);
                } catch (\Throwable $th) {
                    $th->getMessage();

                }
            }
            return redirect()->back()->with('success', 'SMS sent successfully');

            }else{
                    return redirect()->back()->with('error', 'No mothers found for this schedule');
                }
                
            }
            
            }
            
        }else{
            if($request->mother_id != null){
            $mothers = Mother::find($request->mother_id);
            //fetch phone nember of each mother and send sms to her
            if(count($mothers) > 0){
                    foreach ($mothers as $mother) {
                                    $mother_phone = $mother->phone;
                                    $phone = validatePhoneNumber($mother_phone);
                                    $message = $request->custom_message;
                                    //send sms
                                    try {
                                        $sms = beem_sms($phone, $message);
                                        save_sms($message, $phone, $sms);
                                    } catch (\Throwable $th) {
                                        $th->getMessage();

                                    }
                                }
                    return redirect()->back()->with('success', 'SMS sent successfully');
            }else{
                    return redirect()->back()->with('error', 'No mothers found.');
            }
            
        }
        }

        return to_route('all-compose-sms.create')->with('error', 'error send sms');
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
