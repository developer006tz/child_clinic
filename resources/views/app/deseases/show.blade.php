@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('deseases.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.deseases.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.deseases.inputs.name')</h5>
                    <span>{{ $desease->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.deseases.inputs.type')</h5>
                    <span>{{ $desease->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.deseases.inputs.description')</h5>
                    <span>{{ $desease->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('deseases.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Desease::class)
                <a href="{{ route('deseases.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
