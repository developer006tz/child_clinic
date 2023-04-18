@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('baby-vaccinations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.baby_vaccinations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.baby_vaccinations.inputs.baby_id')</h5>
                    <span
                        >{{ optional($babyVaccination->baby)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_vaccinations.inputs.vacination_id')
                    </h5>
                    <span
                        >{{ optional($babyVaccination->vacination)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_vaccinations.inputs.date_of_vaccine')
                    </h5>
                    <span>{{ $babyVaccination->date_of_vaccine ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_vaccinations.inputs.reaction_occured')
                    </h5>
                    <span>{{ $babyVaccination->reaction_occured ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_vaccinations.inputs.is_vaccinated')
                    </h5>
                    <span>{{ $babyVaccination->is_vaccinated ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('baby-vaccinations.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BabyVaccination::class)
                <a
                    href="{{ route('baby-vaccinations.create') }}"
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
