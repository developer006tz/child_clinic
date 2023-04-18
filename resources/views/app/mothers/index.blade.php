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
                @can('create', App\Models\Mother::class)
                <a href="{{ route('mothers.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.mothers.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.clinic_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.blood_type_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.dob')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.insurance_info')
                            </th>
                            <th class="text-left">
                                @lang('crud.mothers.inputs.occupation')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mothers as $mother)
                        <tr>
                            <td>{{ $mother->clinic_id ?? '-' }}</td>
                            <td>{{ $mother->name ?? '-' }}</td>
                            <td>
                                {{ optional($mother->bloodType)->name ?? '-' }}
                            </td>
                            <td>{{ $mother->dob ?? '-' }}</td>
                            <td>{{ $mother->phone ?? '-' }}</td>
                            <td>{{ $mother->address ?? '-' }}</td>
                            <td>{{ $mother->insurance_info ?? '-' }}</td>
                            <td>{{ $mother->occupation ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $mother)
                                    <a
                                        href="{{ route('mothers.edit', $mother) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $mother)
                                    <a
                                        href="{{ route('mothers.show', $mother) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $mother)
                                    <form
                                        action="{{ route('mothers.destroy', $mother) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $mothers->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
