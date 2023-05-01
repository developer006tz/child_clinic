@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('baby-medical-histories.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.baby_medical_histories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_histories.inputs.desease_id')
                    </h5>
                    <span
                    >{{ optional($babyMedicalHistory->baby)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_histories.inputs.baby_id')
                    </h5>
                    <span
                        >{{ optional($babyMedicalHistory->desease)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_histories.inputs.level_of_illness')
                    </h5>
                    <span
                        >{{ $babyMedicalHistory->level_of_illness ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_histories.inputs.description')
                    </h5>
                    <span>{{ $babyMedicalHistory->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.baby_medical_histories.inputs.date')</h5>
                    <span>{{ $babyMedicalHistory->date ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('baby-medical-histories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BabyMedicalHistory::class)
                <a
                    href="{{ route('baby-medical-histories.create') }}"
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
