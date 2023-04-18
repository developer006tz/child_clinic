@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('fathers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.fathers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.fathers.inputs.name')</h5>
                    <span>{{ $father->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fathers.inputs.dob')</h5>
                    <span>{{ $father->dob ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fathers.inputs.phone')</h5>
                    <span>{{ $father->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fathers.inputs.address')</h5>
                    <span>{{ $father->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fathers.inputs.occupation')</h5>
                    <span>{{ $father->occupation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fathers.inputs.mother_id')</h5>
                    <span>{{ optional($father->mother)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('fathers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Father::class)
                <a href="{{ route('fathers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
