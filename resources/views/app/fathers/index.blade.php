@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.fathers.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Father::class)
                <a href="{{ route('fathers.create') }}" class="btn btn-primary">
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
                                @lang('crud.fathers.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.fathers.inputs.dob')
                            </th>
                            <th class="text-left">
                                @lang('crud.fathers.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.fathers.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.fathers.inputs.occupation')
                            </th>
                            <th class="text-left">
                                @lang('crud.fathers.inputs.mother_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fathers as $father)
                        <tr>
                            <td>{{ $father->name ?? '-' }}</td>
                            <td>{{ $father->dob ?? '-' }}</td>
                            <td>{{ $father->phone ?? '-' }}</td>
                            <td>{{ $father->address ?? '-' }}</td>
                            <td>{{ $father->occupation ?? '-' }}</td>
                            <td>
                                {{ optional($father->mother)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $father)
                                    <a
                                        href="{{ route('fathers.edit', $father) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $father)
                                    <a
                                        href="{{ route('fathers.show', $father) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $father)
                                    <form
                                        action="{{ route('fathers.destroy', $father) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $fathers->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
