@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>@lang('crud.mothers.create_title')</h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <x-form
                method="POST"
                action="{{ route('mothers.store') }}"
                class="mt-4"
            >
                @include('app.mothers.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('mothers.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        submit
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
