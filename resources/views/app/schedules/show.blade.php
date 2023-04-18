@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('schedules.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.schedules.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.schedules.inputs.name')</h5>
                    <span>{{ $schedule->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.schedules.inputs.message')</h5>
                    <span>{{ $schedule->message ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.schedules.inputs.date_start')</h5>
                    <span>{{ $schedule->date_start ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.schedules.inputs.date_end')</h5>
                    <span>{{ $schedule->date_end ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.schedules.inputs.time_start')</h5>
                    <span>{{ $schedule->time_start ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.schedules.inputs.time_end')</h5>
                    <span>{{ $schedule->time_end ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('schedules.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Schedule::class)
                <a href="{{ route('schedules.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
