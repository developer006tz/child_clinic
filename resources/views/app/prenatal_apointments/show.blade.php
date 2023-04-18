@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('prenatal-apointments.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.prenatal_apointments.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.prenatal_apointments.inputs.pregnant_id')
                    </h5>
                    <span
                        >{{ optional($prenatalApointment->pregnant)->due_date ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.prenatal_apointments.inputs.date')</h5>
                    <span>{{ $prenatalApointment->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.prenatal_apointments.inputs.time')</h5>
                    <span>{{ $prenatalApointment->time ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('prenatal-apointments.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\PrenatalApointment::class)
                <a
                    href="{{ route('prenatal-apointments.create') }}"
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
