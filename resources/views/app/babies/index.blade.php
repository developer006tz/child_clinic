@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>@lang('crud.babies.index_title')</h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Baby::class)
                <a href="{{ route('babies.create') }}" class="btn btn-primary">
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
                                @lang('crud.babies.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.babies.inputs.gender')
                            </th>
                            <th class="text-left">
                                @lang('crud.babies.inputs.birthdate')
                            </th>
                            <th class="text-right">
                                @lang('crud.babies.inputs.weight_at_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.babies.inputs.mother_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.babies.inputs.father_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($babies as $baby)
                        <tr>
                            <td>{{ $baby->name ?? '-' }}</td>
                            <td>{{ $baby->gender ?? '-' }}</td>
                            <td>{{ $baby->birthdate ?? '-' }}</td>
                            <td>{{ $baby->weight_at_birth ?? '-' }}</td>
                            <td>{{ optional($baby->mother)->name ?? '-' }}</td>
                            <td>{{ optional($baby->father)->name ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $baby)
                                    <a href="{{ route('babies.edit', $baby) }}">
                                        <button
                                            type="button"
                                            class="btn btn-outline-warning"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $baby)
                                    <a href="{{ route('babies.show', $baby) }}">
                                        <button
                                            type="button"
                                            class="btn btn-outline-info"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $baby)
                                    <form
                                        action="{{ route('babies.destroy', $baby) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger"
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
                    {{--<tfoot>
                        <tr>
                            <td colspan="7">{!! $babies->render() !!}</td>
                        </tr>
                    </tfoot>--}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
