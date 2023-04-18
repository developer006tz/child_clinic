@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\MotherMedicalHistory::class)
                <a
                    href="{{ route('mother-medical-histories.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.mother_medical_histories.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.mother_medical_histories.inputs.mother_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_medical_histories.inputs.illnes')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_medical_histories.inputs.Description')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_medical_histories.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_medical_histories.inputs.status')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($motherMedicalHistories as $motherMedicalHistory)
                        <tr>
                            <td>
                                {{ optional($motherMedicalHistory->mother)->name ?? '-' }}
                            </td>
                            <td>{{ $motherMedicalHistory->illnes ?? '-' }}</td>
                            <td>
                                {{ $motherMedicalHistory->Description ?? '-' }}
                            </td>
                            <td>{{ $motherMedicalHistory->date ?? '-' }}</td>
                            <td>{{ $motherMedicalHistory->status ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div role="group" aria-label="Row Actions" class="btn-group">
                                    @can('update', $motherMedicalHistory)
                                        <a href="{{ route('mother-medical-histories.edit', $motherMedicalHistory) }}">
                                            <button type="button" class="btn btn-light">
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('view', $motherMedicalHistory)
                                        <a href="{{ route('mother-medical-histories.show', $motherMedicalHistory) }}">
                                            <button type="button" class="btn btn-light">
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('delete', $motherMedicalHistory)
                                        <form action="{{ route('mother-medical-histories.destroy', $motherMedicalHistory) }}" method="POST"
                                              onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light text-danger">
                                                <i class="icon ion-md-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {!! $motherMedicalHistories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
