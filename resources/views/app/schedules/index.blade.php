@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.schedules.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right d-flex flex-row align-items-center justify-content-end">
                @can('create', App\Models\Schedule::class)
                <a href="#milestone_modal" class="mx-3 btn btn-success" data-toggle="modal" data-target="#schedule_time"><b> <i class="icon ion-md-create"></i> set schedule execution time</b></a>

                <a
                    href="{{ route('schedules.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>

                
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="myTable_simple">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.schedules.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.schedules.inputs.message')
                            </th>
                            <th class="text-left">
                                @lang('crud.schedules.inputs.date_start')
                            </th>
                            <th class="text-left">
                                @lang('crud.schedules.inputs.date_end')
                            </th>
                            <th>
                                schedule execution time
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                            {{-- <th style="width: 21%">
                                execution
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $time = \App\Models\ScheduleTime::first()->time;
                        if($time){
                            $time = \Carbon\Carbon::parse($time)->format('H:i');
                        }else{
                            $time = \Carbon\Carbon::now()->format('H:i');
                        }
                        @endphp
                        @forelse($schedules as $schedule)
                        <tr>
                            <td style="width:150px">{{ $schedule->name ?? '-' }}</td>
                            <td>{{ $schedule->message ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->date_start)->format('d/m/Y') ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->date_end)->format('d/m/Y') ?? '-' }}</td>
                            <td> <a href="#"> {{$time ?? '-'}}</a></td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                
                                    @can('update', $schedule)
                                    <a
                                        href="{{ route('schedules.edit', $schedule) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn mx-2 btn-primary"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan
                                     @can('delete', $schedule)
                                    <form
                                        action="{{ route('schedules.destroy', $schedule) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-danger text-light"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan

                                   
                                </div>
                            </td>
                            {{-- <td>
                                 @can('update', $schedule)
                                    <a
                                        href="{{ route('scheduletime.execute') }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn mx-2 btn-primary"
                                        >
                                            execute schedule work
                                        </button>
                                    </a>
                                    @endcan
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">{!! $schedules->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

 @include('modals.schedule-time')
@endsection
