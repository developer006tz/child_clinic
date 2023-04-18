@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('blood-types.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.blood_types.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.blood_types.inputs.name')</h5>
                    <span>{{ $bloodType->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.blood_types.inputs.description')</h5>
                    <span>{{ $bloodType->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.blood_types.inputs.rh_factor')</h5>
                    <span>{{ $bloodType->rh_factor ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('blood-types.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BloodType::class)
                <a
                    href="{{ route('blood-types.create') }}"
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
