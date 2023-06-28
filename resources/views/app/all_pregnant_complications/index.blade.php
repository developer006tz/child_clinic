@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.all_pregnant_complications.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\PregnantComplications::class)
                <a
                    href="{{ route('all-pregnant-complications.create') }}"
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
                                @lang('crud.all_pregnant_complications.inputs.pregnant_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_pregnant_complications.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_pregnant_complications.inputs.description')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($allPregnantComplications as $pregnantComplications)
                        <tr>
                            <td>
                                {{
                                optional($pregnantComplications->pregnant)->due_date
                                ?? '-' }}
                            </td>
                            <td>{{ $pregnantComplications->name ?? '-' }}</td>
                            <td>
                                {{ $pregnantComplications->description ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $pregnantComplications)
                                        <a
                                            href="{{ route('all-pregnant-complications.edit', $pregnantComplications) }}"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        </a>
                                    @endcan @can('view', $pregnantComplications)
                                        <a
                                            href="{{ route('all-pregnant-complications.show', $pregnantComplications) }}"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                    @endcan @can('delete',
                    $pregnantComplications)
                                        <form
                                            action="{{ route('all-pregnant-complications.destroy', $pregnantComplications) }}"
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
                            <td colspan="4">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                {!! $allPregnantComplications->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
