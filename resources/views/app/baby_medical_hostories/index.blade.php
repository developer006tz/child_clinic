@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.baby_medical_hostories.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\BabyMedicalHostory::class)
                <a
                    href="{{ route('baby-medical-hostories.create') }}"
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
                <table class="table table-borderless table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.baby_medical_hostories.inputs.desease_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_hostories.inputs.level_of_illness')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_hostories.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_medical_hostories.inputs.date')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($babyMedicalHostories as $babyMedicalHostory)
                        <tr>
                            <td>
                                {{ optional($babyMedicalHostory->desease)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $babyMedicalHostory->level_of_illness ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $babyMedicalHostory->description ?? '-' }}
                            </td>
                            <td>{{ $babyMedicalHostory->date ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $babyMedicalHostory)
                                    <a
                                        href="{{ route('baby-medical-hostories.edit', $babyMedicalHostory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $babyMedicalHostory)
                                    <a
                                        href="{{ route('baby-medical-hostories.show', $babyMedicalHostory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $babyMedicalHostory)
                                    <form
                                        action="{{ route('baby-medical-hostories.destroy', $babyMedicalHostory) }}"
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
                                {!! $babyMedicalHostories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
