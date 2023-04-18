@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('insurances.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.insurances.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.insurances.inputs.provider_name')</h5>
                    <span>{{ $insurance->provider_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.insurances.inputs.insurance_name')</h5>
                    <span>{{ $insurance->insurance_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.insurances.inputs.policy_number')</h5>
                    <span>{{ $insurance->policy_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.insurances.inputs.contact')</h5>
                    <span>{{ $insurance->contact ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('insurances.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Insurance::class)
                <a
                    href="{{ route('insurances.create') }}"
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
