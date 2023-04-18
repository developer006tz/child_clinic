@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('baby-development-milestones.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.baby_development_milestones.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_development_milestones.inputs.baby_id')
                    </h5>
                    <span
                        >{{ optional($babyDevelopmentMilestone->baby)->name ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_development_milestones.inputs.first_smile')
                    </h5>
                    <span
                        >{{ $babyDevelopmentMilestone->first_smile ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_development_milestones.inputs.first_word')
                    </h5>
                    <span
                        >{{ $babyDevelopmentMilestone->first_word ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.baby_development_milestones.inputs.first_step')
                    </h5>
                    <span
                        >{{ $babyDevelopmentMilestone->first_step ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('baby-development-milestones.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BabyDevelopmentMilestone::class)
                <a
                    href="{{ route('baby-development-milestones.create') }}"
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
