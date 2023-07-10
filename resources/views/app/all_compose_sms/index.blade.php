@extends('layouts.app')

@section('content')

<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2> @lang('crud.all_compose_sms.index_title')</h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\ComposeSms::class)
                <a
                    href="{{ route('all-compose-sms.create') }}"
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
                <table class="table table-bordered table-hover" class="myTable_simple">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_compose_sms.inputs.message_template_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_compose_sms.inputs.custom_message')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allComposeSms as $composeSms)
                        <tr>
                            <td>
                                {{ optional($composeSms->messageTemplate)->name
                                ?? '-' }}
                            </td>
                            <td>{{ $composeSms->custom_message ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $composeSms)
                                    <a
                                        href="{{ route('all-compose-sms.edit', $composeSms) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $composeSms)
                                    <a
                                        href="{{ route('all-compose-sms.show', $composeSms) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-info mx-2"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $composeSms)
                                    <form
                                        action="{{ route('all-compose-sms.destroy', $composeSms) }}"
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
                            <td colspan="3">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                {!! $allComposeSms->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
