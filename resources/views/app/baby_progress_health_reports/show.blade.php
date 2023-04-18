@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('baby-progress-health-reports.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.baby_progress_health_reports.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_progress_health_reports.inputs.baby_id')
                    </h5>
                    <span
                        >{{ optional($babyProgressHealthReport->baby)->name ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_progress_health_reports.inputs.current_height')
                    </h5>
                    <span
                        >{{ $babyProgressHealthReport->current_height ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_progress_health_reports.inputs.current_weight')
                    </h5>
                    <span
                        >{{ $babyProgressHealthReport->current_weight ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_progress_health_reports.inputs.current_health_status')
                    </h5>
                    <span
                        >{{ $babyProgressHealthReport->current_health_status ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_progress_health_reports.inputs.bmi')
                    </h5>
                    <span>{{ $babyProgressHealthReport->bmi ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('baby-progress-health-reports.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BabyProgressHealthReport::class)
                <a
                    href="{{ route('baby-progress-health-reports.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
