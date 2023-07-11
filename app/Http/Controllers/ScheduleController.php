<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Mother;
use App\Models\MotherSchedules;
use App\Models\scheduleTime;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ScheduleStoreRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Schedule::class);

        $search = $request->get('search', '');

        $schedules = Schedule::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.schedules.index', compact('schedules', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Schedule::class);

        return view('app.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Schedule::class);

        $validated = $request->validated();

        $schedule = Schedule::create($validated);

        return redirect()
            ->route('schedules.index', $schedule)
            ->withSuccess(__('crud.common.created'));
    }

    public function generate_schedule(Request $request): RedirectResponse
    {
        $this->authorize('create', Schedule::class);

        // check if start_date is empty or end_date is empty
        if (empty($request->start_date) || empty($request->end_date)) {
           if( !empty($request->mothers) && in_array('0', $request->mothers)){
                $mothers = Mother::whereHas('babies')->get();
           }else{
                if(!empty($request->mothers)){
                    $mothers = Mother::find($request->mothers);
                }else{
                    return redirect()
                    ->route('all-compose-sms.create')
                    ->withError('choose mothers by date range or selecting them');
                }
                
           }
        }else{
            $mothers = Mother::whereHas('babies')->whereBetween('created_at', [$request->start_date, $request->end_date])->get();
        }
  
        //check if mothers are not empty then loop through them to create mother_schedules for each mother
        if(!empty($mothers)){
            $schedule = Schedule::find($request->schedule);
            foreach ($mothers as $mother) {
                $message = sprintf($schedule->message, $mother->name, \Carbon\Carbon::parse($schedule->start_date)->format('d/m/Y'), $schedule->name);
                MotherSchedules::create([
                    'mother_id' => $mother->id,
                    'schedule_id' => $request->schedule,
                    'message'=> $message,
                    'status' => '0',
                    'date' => now(),
                ]);
            }

            return to_route('all-compose-sms.create')->withSuccess('Schedules Created successfull');
        }else{
            return redirect()
            ->route('all-compose-sms.create')
            ->withError('No mothers found');
        }
        
    }

    public function set_schedule_time(Request $request):RedirectResponse 
    {


        $validated = $request->validate([
            'time' => 'required',
        ]);

        //return the first record of scheduleTime::class
        $check = scheduleTime::first();
        if(!empty($check)){
            $check->update($validated);
        }else{
            scheduleTime::create($validated);
        }

        return redirect()
            ->route('schedules.index')
            ->withSuccess(__('crud.common.saved'));
        
    }

    public function executeSchedule()
    {
        $process = new Process(['php', 'artisan', 'schedule:work']);
        $process->start();
        sleep(120); // Wait for 3 minutes (180 seconds)
        $process->stop();
        return redirect()
            ->route('schedules.index')
            ->withSuccess(__('Schedule executed successfully'));
    }

    // public function executeSchedule()
    // {
    //     Artisan::queue('schedule:execute');
    //     return redirect()
    //         ->route('schedules.index')
    //         ->withSuccess(__('Schedule executed successfully'));
    // }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, Schedule $schedule): View
    {
        $this->authorize('view', $schedule);

        return view('app.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Schedule $schedule): View
    {
        $this->authorize('update', $schedule);

        return view('app.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ScheduleUpdateRequest $request,
        Schedule $schedule
    ): RedirectResponse {
        $this->authorize('update', $schedule);

        $validated = $request->validated();

        $schedule->update($validated);

        return redirect()
            ->route('schedules.index', $schedule)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Schedule $schedule
    ): RedirectResponse {
        $this->authorize('delete', $schedule);

        $schedule->delete();

        return redirect()
            ->route('schedules.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
