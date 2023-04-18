@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('clinics.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.clinics.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.clinics.inputs.name')</h5>
                    <span>{{ $clinic->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clinics.inputs.location')</h5>
                    <span>{{ $clinic->location ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clinics.inputs.registration_number')</h5>
                    <span>{{ $clinic->registration_number ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('clinics.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Clinic::class)
                <a href="{{ route('clinics.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
