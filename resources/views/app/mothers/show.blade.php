@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('mothers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.mothers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.clinic_id')</h5>
                    <span>{{ $mother->clinic_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.name')</h5>
                    <span>{{ $mother->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.blood_type_id')</h5>
                    <span>{{ optional($mother->bloodType)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.dob')</h5>
                    <span>{{ $mother->dob ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.phone')</h5>
                    <span>{{ $mother->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.address')</h5>
                    <span>{{ $mother->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.insurance_info')</h5>
                    <span>{{ $mother->insurance_info ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mothers.inputs.occupation')</h5>
                    <span>{{ $mother->occupation ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('mothers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Mother::class)
                <a href="{{ route('mothers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
