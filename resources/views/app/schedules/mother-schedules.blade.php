@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                       Created Schedules
                    </h2>
                </div>
                <div class="col-md-6 text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> back
                        </a>
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
                                mother name
                            </th>
                            <th class="text-left">
                               schedule title
                            </th>
                            <th class="text-left">
                                message to be sent
                            </th>
                            <th class="text-left">
                                schedule date
                            </th>
                            <th class="text-left">
                                message sent status
                            </th>
                            <th class="text-center">
                                actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($all_mother_schedules as $schedule)
                            @php
                            $mother_name = \App\Models\Mother::where('id',$schedule->mother_id)->first()->name;
                              @endphp
                            <tr>
                                <td>{{ $mother_name ?? '-' }}</td>
                                <td>{{ $schedule->schedule->name ?? '-' }}</td>
                                <td>{{ $schedule->message ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($schedule->schedule->date_start)->format('d/m/Y') ?? '-' }}</td>
                                <td>@if($schedule->status==1) <span class="badge badge-success">sent</span> @else()<span class="badge badge-warning">pending</span>  @endif</td>
                                <td class="text-center" style="width: 134px;">
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="btn-group"
                                    >
                                         @can('delete', $schedule)
                                            <form
                                                action="{{ route('users.destroy', $schedule) }}"
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
                                <td colspan="5">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">{!! $all_mother_schedules->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
