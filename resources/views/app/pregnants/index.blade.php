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
                @can('create', App\Models\Pregnant::class)
                <a
                    href="{{ route('pregnants.create') }}"
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
                <h4 class="card-title">@lang('crud.pregnants.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.pregnants.inputs.mother_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.pregnants.inputs.due_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.pregnants.inputs.date_of_delivery')
                            </th>
                            <th class="text-left">
                                @lang('crud.pregnants.inputs.time_of_delivery')
                            </th>
                            <th class="text-right">
                                @lang('crud.pregnants.inputs.number_of_weeks_lasted')
                            </th>
                            <th class="text-right">
                                @lang('crud.pregnants.inputs.weight_at_birth')
                            </th>
                            <th class="text-right">
                                @lang('crud.pregnants.inputs.height_at_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.pregnants.inputs.gender')
                            </th>
                            <th class="text-left">
                                @lang('crud.pregnants.inputs.pregnant_defects')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pregnants as $pregnant)
                        <tr>
                            <td>
                                {{ optional($pregnant->mother)->name ?? '-' }}
                            </td>
                            <td>{{ $pregnant->due_date ?? '-' }}</td>
                            <td>{{ $pregnant->date_of_delivery ?? '-' }}</td>
                            <td>{{ $pregnant->time_of_delivery ?? '-' }}</td>
                            <td>
                                {{ $pregnant->number_of_weeks_lasted ?? '-' }}
                            </td>
                            <td>{{ $pregnant->weight_at_birth ?? '-' }}</td>
                            <td>{{ $pregnant->height_at_birth ?? '-' }}</td>
                            <td>{{ $pregnant->gender ?? '-' }}</td>
                            <td>{{ $pregnant->pregnant_defects ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $pregnant)
                                    <a
                                        href="{{ route('pregnants.edit', $pregnant) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $pregnant)
                                    <a
                                        href="{{ route('pregnants.show', $pregnant) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $pregnant)
                                    <form
                                        action="{{ route('pregnants.destroy', $pregnant) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $pregnants->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
