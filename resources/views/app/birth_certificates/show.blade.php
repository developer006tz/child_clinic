@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('birth-certificates.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.birth_certificates.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.birth_certificates.inputs.baby_id')</h5>
                    <span
                        >{{ optional($birthCertificate->baby)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.birth_certificates.inputs.date_of_birth')
                    </h5>
                    <span>{{ $birthCertificate->date_of_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.birth_certificates.inputs.Hospital')</h5>
                    <span>{{ $birthCertificate->Hospital ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.birth_certificates.inputs.mother_id')</h5>
                    <span
                        >{{ optional($birthCertificate->mother)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.birth_certificates.inputs.father_id')</h5>
                    <span
                        >{{ optional($birthCertificate->father)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.birth_certificates.inputs.father_ocupation')
                    </h5>
                    <span
                        >{{ $birthCertificate->father_ocupation ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.birth_certificates.inputs.Mother_ocupation')
                    </h5>
                    <span
                        >{{ $birthCertificate->Mother_ocupation ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.birth_certificates.inputs.father_address')
                    </h5>
                    <span>{{ $birthCertificate->father_address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.birth_certificates.inputs.Mother_address')
                    </h5>
                    <span>{{ $birthCertificate->Mother_address ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('birth-certificates.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BirthCertificate::class)
                <a
                    href="{{ route('birth-certificates.create') }}"
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
