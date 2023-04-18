@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('cards.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cards.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.baby_id')</h5>
                    <span>{{ optional($card->baby)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.issue_number')</h5>
                    <span>{{ $card->issue_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.weight')</h5>
                    <span>{{ $card->weight ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.height')</h5>
                    <span>{{ $card->height ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.head_circumference')</h5>
                    <span>{{ $card->head_circumference ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.apgar_score')</h5>
                    <span>{{ $card->apgar_score ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.birth_defects')</h5>
                    <span>{{ $card->birth_defects ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cards.inputs.blood_type_id')</h5>
                    <span>{{ optional($card->bloodType)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('cards.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Card::class)
                <a href="{{ route('cards.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
