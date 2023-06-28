@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h2>

                        @lang('crud.baby_development_milestones.index_title')

                    </h2>

                </div>

                <div class="col-md-6 text-right">

                    @can('create', App\Models\BabyDevelopmentMilestone::class)

                        <a

                            href="{{ route('baby-development-milestones.create') }}"

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

                                @lang('crud.baby_development_milestones.inputs.baby_id')

                            </th>

                            <th class="text-left">

                                @lang('crud.baby_development_milestones.inputs.first_smile')

                            </th>

                            <th class="text-left">

                                @lang('crud.baby_development_milestones.inputs.first_word')

                            </th>

                            <th class="text-left">

                                @lang('crud.baby_development_milestones.inputs.first_step')

                            </th>

                            <th class="text-center">

                                @lang('crud.common.actions')

                            </th>

                        </tr>

                        </thead>

                        <tbody>

                        @forelse ($babyDevelopmentMilestones as $babyDevelopmentMilestone)

                            <tr>

                                <td >

                                    {{

                                    optional($babyDevelopmentMilestone->baby)->name

                                    ?? '-'

                                    }}

                                </td>

                                <td>

                                    {{ $babyDevelopmentMilestone->first_smile ?? '-' }}

                                </td>

                                <td>

                                    {{ $babyDevelopmentMilestone->first_word ?? '-' }}

                                </td>

                                <td>

                                    {{ $babyDevelopmentMilestone->first_step ?? '-' }}

                                </td>

                                <td class="text-center" style="width: 134px;">

                                    <div role="group" aria-label="Row Actions" class="btn-group">

                                        @can('update', $babyDevelopmentMilestone)

                                            <a href="{{ route('baby-development-milestones.edit', $babyDevelopmentMilestone) }}">

                                                <button type="button" class="btn btn-light">

                                                    <i class="icon ion-md-create"></i>

                                                </button>

                                            </a>

                                        @endcan

                                        @can('view', $babyDevelopmentMilestone)

                                            <a href="{{ route('baby-development-milestones.show', $babyDevelopmentMilestone) }}">

                                                <button type="button" class="btn btn-light">

                                                    <i class="icon ion-md-eye"></i>

                                                </button>

                                            </a>

                                        @endcan

                                        @can('delete', $babyDevelopmentMilestone)

                                            <form action="{{ route('baby-development-milestones.destroy', $babyDevelopmentMilestone) }}" method="POST" onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">

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

                                <td colspan="5">

                                    @lang('crud.common.no_items_found')

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                        <tfoot>

                        <tr>

                            <td colspan="5">

                                {!! $babyDevelopmentMilestones->render() !!}

                            </td>

                        </tr>

                        </tfoot>



                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection

