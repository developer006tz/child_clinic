@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('all-pregnant-complications.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_pregnant_complications.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_pregnant_complications.inputs.pregnant_id')
                    </h5>
                    <span
                        >{{ optional($pregnantComplications->pregnant)->due_date
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_pregnant_complications.inputs.name')
                    </h5>
                    <span>{{ $pregnantComplications->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_pregnant_complications.inputs.description')
                    </h5>
                    <span
                        >{{ $pregnantComplications->description ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-pregnant-complications.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\PregnantComplications::class)
                <a
                    href="{{ route('all-pregnant-complications.create') }}"
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
