@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('baby-medical-hostories.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.baby_medical_hostories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_hostories.inputs.desease_id')
                    </h5>
                    <span
                        >{{ optional($babyMedicalHostory->desease)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_hostories.inputs.level_of_illness')
                    </h5>
                    <span
                        >{{ $babyMedicalHostory->level_of_illness ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_medical_hostories.inputs.description')
                    </h5>
                    <span>{{ $babyMedicalHostory->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.baby_medical_hostories.inputs.date')</h5>
                    <span>{{ $babyMedicalHostory->date ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('baby-medical-hostories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BabyMedicalHostory::class)
                <a
                    href="{{ route('baby-medical-hostories.create') }}"
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
