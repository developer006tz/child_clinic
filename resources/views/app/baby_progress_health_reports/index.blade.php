@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.baby_progress_health_reports.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\BabyProgressHealthReport::class)
                <a
                    href="{{ route('baby-progress-health-reports.create') }}"
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
                                @lang('crud.baby_progress_health_reports.inputs.baby_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.baby_progress_health_reports.inputs.current_height')
                            </th>
                            <th class="text-right">
                                @lang('crud.baby_progress_health_reports.inputs.current_weight')
                            </th>
                            <th class="text-left">
                                @lang('crud.baby_progress_health_reports.inputs.current_health_status')
                            </th>
                            <th class="text-right">
                                @lang('crud.baby_progress_health_reports.inputs.bmi')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($babyProgressHealthReports as $babyProgressHealthReport)
                        <tr>
                            <td>{{ optional($babyProgressHealthReport->baby)->name ?? '-' }}</td>
                            <td>{{ $babyProgressHealthReport->current_height ?? '-' }}</td>
                            <td>{{ $babyProgressHealthReport->current_weight ?? '-' }}</td>
                            <td>{{ $babyProgressHealthReport->current_health_status ?? '-' }}</td>
                            <td>{{ $babyProgressHealthReport->bmi ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div role="group" aria-label="Row Actions" class="btn-group">
                                    @can('update', $babyProgressHealthReport)
                                        <a href="{{ route('baby-progress-health-reports.edit', $babyProgressHealthReport) }}">
                                            <button type="button" class="btn btn-light">
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('view', $babyProgressHealthReport)
                                        <a href="{{ route('baby-progress-health-reports.show', $babyProgressHealthReport) }}">
                                            <button type="button" class="btn btn-light">
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('delete', $babyProgressHealthReport)
                                        <form action="{{ route('baby-progress-health-reports.destroy', $babyProgressHealthReport) }}" method="POST" onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
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
                            <td colspan="6">@lang('crud.common.no_items_found')</td>
                        </tr>
                    @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {!! $babyProgressHealthReports->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
