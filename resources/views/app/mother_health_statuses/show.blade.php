@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('mother-health-statuses.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.mother_health_statuses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_health_statuses.inputs.mother_id')
                    </h5>
                    <span
                        >{{ optional($motherHealthStatus->mother)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mother_health_statuses.inputs.height')</h5>
                    <span>{{ $motherHealthStatus->height ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mother_health_statuses.inputs.weight')</h5>
                    <span>{{ $motherHealthStatus->weight ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_health_statuses.inputs.hiv_status')
                    </h5>
                    <span>{{ $motherHealthStatus->hiv_status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_health_statuses.inputs.desease_id')
                    </h5>
                    <span
                        >{{ optional($motherHealthStatus->desease)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_health_statuses.inputs.health_status')
                    </h5>
                    <span>{{ $motherHealthStatus->health_status ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('mother-health-statuses.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\MotherHealthStatus::class)
                <a
                    href="{{ route('mother-health-statuses.create') }}"
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
