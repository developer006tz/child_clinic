@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.cards.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Card::class)
                <a href="{{ route('cards.create') }}" class="btn btn-primary">
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
                                @lang('crud.cards.inputs.baby_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.cards.inputs.issue_number')
                            </th>
                            <th class="text-right">
                                @lang('crud.cards.inputs.weight')
                            </th>
                            <th class="text-right">
                                @lang('crud.cards.inputs.height')
                            </th>
                            <th class="text-right">
                                @lang('crud.cards.inputs.head_circumference')
                            </th>
                            <th class="text-right">
                                @lang('crud.cards.inputs.apgar_score')
                            </th>
                            <th class="text-left">
                                @lang('crud.cards.inputs.birth_defects')
                            </th>
                            <th class="text-left">
                                @lang('crud.cards.inputs.blood_type_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cards as $card)
                        <tr>
                            <td>{{ optional($card->baby)->name ?? '-' }}</td>
                            <td>{{ $card->issue_number ?? '-' }}</td>
                            <td>{{ $card->weight ?? '-' }}</td>
                            <td>{{ $card->height ?? '-' }}</td>
                            <td>{{ $card->head_circumference ?? '-' }}</td>
                            <td>{{ $card->apgar_score ?? '-' }}</td>
                            <td>{{ $card->birth_defects ?? '-' }}</td>
                            <td>
                                {{ optional($card->bloodType)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $card)
                                    <a href="{{ route('cards.edit', $card) }}">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $card)
                                    <a href="{{ route('cards.show', $card) }}">
                                        <button
                                            type="button"
                                            class="btn btn-info mx-2"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $card)
                                    <form
                                        action="{{ route('cards.destroy', $card) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $cards->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
