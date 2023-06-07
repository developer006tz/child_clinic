@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.baby_medical_histories.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\BabyMedicalHistory::class)
                <a
                    href="{{ route('baby-medical-histories.create') }}"
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

            <div class="table-responsive">
                <table class="table table-borderless table-hover" id="myTable_simple">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.baby_medical_histories.inputs.baby_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_histories.inputs.desease_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_histories.inputs.level_of_illness')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_histories.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_histories.inputs.date')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($babyMedicalHistories as $babyMedicalHistory)
                        <tr>
                            <td>
                                {{ optional($babyMedicalHistory->baby)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($babyMedicalHistory->desease)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $babyMedicalHistory->level_of_illness ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $babyMedicalHistory->description ?? '-' }}
                            </td>
                            <td>{{ $babyMedicalHistory->date ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $babyMedicalHistory)
                                    <a
                                        href="{{ route('baby-medical-histories.edit', $babyMedicalHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $babyMedicalHistory)
                                    <a
                                        href="{{ route('baby-medical-histories.show', $babyMedicalHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $babyMedicalHistory)
                                    <form
                                        action="{{ route('baby-medical-histories.destroy', $babyMedicalHistory) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                {!! $babyMedicalHistories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
