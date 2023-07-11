@extends('layouts.app')

@section('content')

{{-- test  --}}


<div class="container">
        <h5 class="mb-2">MESSAGES REPORTS</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Messages</span>
                <span class="info-box-number">{{$allSms->count() ?? '0'}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sent Messages</span>
                <span class="info-box-number">{{$allSms->where('status','1')->count() ?? '0'}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Messages</span>
                <span class="info-box-number">{{$allSms->where('status','0')->count() ?? '0'}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Failed</span>
                <span class="info-box-number">{{$allSms->where('status','2')->count() ?? '0'}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

{{-- end test  --}}
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.all_sms.index_title')
                </h2>
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
                                @lang('crud.all_sms.inputs.body')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_sms.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_sms.inputs.status')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allSms as $sms)
                        <tr>
                            <td>{{ $sms->body ?? '-' }}</td>
                            <td>{{ $sms->phone ?? '-' }}</td>
                            <td>{{ $sms->status ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $sms)
                                    <a href="{{ route('all-sms.edit', $sms) }}">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $sms)
                                    <a href="{{ route('all-sms.show', $sms) }}">
                                        <button
                                            type="button"
                                            class="btn btn-info mx-2"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $sms)
                                    <form
                                        action="{{ route('all-sms.destroy', $sms) }}"
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
                            <td colspan="4">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">{!! $allSms->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
