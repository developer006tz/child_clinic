@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.baby_vaccinations.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\BabyVaccination::class)
                <a
                    href="{{ route('baby-vaccinations.create') }}"
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
                <table class="table table-bordered table-hover" id="myTable_simple">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.baby_vaccinations.inputs.baby_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_vaccinations.inputs.vacination_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_vaccinations.inputs.date_of_vaccine')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_vaccinations.inputs.reaction_occured')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_vaccinations.inputs.is_vaccinated')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($babyVaccinations as $babyVaccination)
                        <tr>
                            <td>
                                {{ optional($babyVaccination->baby)->name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($babyVaccination->vacination)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $babyVaccination->date_of_vaccine ?? '-' }}
                            </td>
                            <td>
                                {{ $babyVaccination->reaction_occured ?? '-' }}
                            </td>
                            <td>
                                {{ $babyVaccination->is_vaccinated ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $babyVaccination)
                                    <a
                                        href="{{ route('baby-vaccinations.edit', $babyVaccination) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $babyVaccination)
                                    <a
                                        href="{{ route('baby-vaccinations.show', $babyVaccination) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $babyVaccination)
                                    <form
                                        action="{{ route('baby-vaccinations.destroy', $babyVaccination) }}"
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
                            <td colspan="6">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {!! $babyVaccinations->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
