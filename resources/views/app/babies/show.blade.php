@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('babies.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.babies.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.babies.inputs.name')</h5>
                    <span>{{ $baby->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.babies.inputs.gender')</h5>
                    <span>{{ $baby->gender ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.babies.inputs.birthdate')</h5>
                    <span>{{ $baby->birthdate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.babies.inputs.weight_at_birth')</h5>
                    <span>{{ $baby->weight_at_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.babies.inputs.mother_id')</h5>
                    <span>{{ optional($baby->mother)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.babies.inputs.father_id')</h5>
                    <span>{{ optional($baby->father)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('babies.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Baby::class)
                <a href="{{ route('babies.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
