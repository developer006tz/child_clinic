@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.prenatal_apointments.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\PrenatalApointment::class)
                <a
                    href="{{ route('prenatal-apointments.create') }}"
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
                                @lang('crud.prenatal_apointments.inputs.pregnant_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.prenatal_apointments.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.prenatal_apointments.inputs.time')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prenatalApointments as $prenatalApointment)
                        <tr>
                            <td>
                                {{
                                optional($prenatalApointment->pregnant)->due_date
                                ?? '-' }}
                            </td>
                            <td>{{ $prenatalApointment->date ?? '-' }}</td>
                            <td>{{ $prenatalApointment->time ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $prenatalApointment)
                                    <a
                                        href="{{ route('prenatal-apointments.edit', $prenatalApointment) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $prenatalApointment)
                                    <a
                                        href="{{ route('prenatal-apointments.show', $prenatalApointment) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $prenatalApointment)
                                    <form
                                        action="{{ route('prenatal-apointments.destroy', $prenatalApointment) }}"
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
                                {!! $prenatalApointments->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
