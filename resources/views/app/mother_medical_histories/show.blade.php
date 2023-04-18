@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('mother-medical-histories.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.mother_medical_histories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_medical_histories.inputs.mother_id')
                    </h5>
                    <span
                        >{{ optional($motherMedicalHistory->mother)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_medical_histories.inputs.illnes')
                    </h5>
                    <span>{{ $motherMedicalHistory->illnes ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_medical_histories.inputs.Description')
                    </h5>
                    <span>{{ $motherMedicalHistory->Description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mother_medical_histories.inputs.date')</h5>
                    <span>{{ $motherMedicalHistory->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.mother_medical_histories.inputs.status')
                    </h5>
                    <span>{{ $motherMedicalHistory->status ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('mother-medical-histories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\MotherMedicalHistory::class)
                <a
                    href="{{ route('mother-medical-histories.create') }}"
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
