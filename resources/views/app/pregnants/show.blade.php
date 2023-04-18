@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('pregnants.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pregnants.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.mother_id')</h5>
                    <span>{{ optional($pregnant->mother)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.due_date')</h5>
                    <span>{{ $pregnant->due_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.date_of_delivery')</h5>
                    <span>{{ $pregnant->date_of_delivery ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.time_of_delivery')</h5>
                    <span>{{ $pregnant->time_of_delivery ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.pregnants.inputs.number_of_weeks_lasted')
                    </h5>
                    <span>{{ $pregnant->number_of_weeks_lasted ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.weight_at_birth')</h5>
                    <span>{{ $pregnant->weight_at_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.height_at_birth')</h5>
                    <span>{{ $pregnant->height_at_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.gender')</h5>
                    <span>{{ $pregnant->gender ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pregnants.inputs.pregnant_defects')</h5>
                    <span>{{ $pregnant->pregnant_defects ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pregnants.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Pregnant::class)
                <a href="{{ route('pregnants.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
