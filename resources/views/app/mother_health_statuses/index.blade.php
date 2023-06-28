@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.mother_health_statuses.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\MotherHealthStatus::class)
                <a
                    href="{{ route('mother-health-statuses.create') }}"
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
                                @lang('crud.mother_health_statuses.inputs.mother_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.mother_health_statuses.inputs.height')
                            </th>
                            <th class="text-right">
                                @lang('crud.mother_health_statuses.inputs.weight')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_health_statuses.inputs.hiv_status')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_health_statuses.inputs.desease_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.mother_health_statuses.inputs.health_status')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($motherHealthStatuses as $motherHealthStatus)
                        <tr>
                            <td>
                                {{ optional($motherHealthStatus->mother)->name
                                ?? '-' }}
                            </td>
                            <td>{{ $motherHealthStatus->height ?? '-' }}</td>
                            <td>{{ $motherHealthStatus->weight ?? '-' }}</td>
                            <td>
                                {{ $motherHealthStatus->hiv_status ?? '-' }}
                            </td>
                            <td>
                                {{ optional($motherHealthStatus->desease)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $motherHealthStatus->health_status ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $motherHealthStatus)
                                    <a
                                        href="{{ route('mother-health-statuses.edit', $motherHealthStatus) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $motherHealthStatus)
                                    <a
                                        href="{{ route('mother-health-statuses.show', $motherHealthStatus) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-info mx-2"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $motherHealthStatus)
                                    <form
                                        action="{{ route('mother-health-statuses.destroy', $motherHealthStatus) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-danger text-light"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $motherHealthStatuses->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
