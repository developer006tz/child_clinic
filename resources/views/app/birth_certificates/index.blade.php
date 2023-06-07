@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    @lang('crud.birth_certificates.index_title')
                </h2>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\BirthCertificate::class)
                <a
                    href="{{ route('birth-certificates.create') }}"
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
                <table class="table table-borderless table-hover" id="myTable_simple">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.baby_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.date_of_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.Hospital')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.mother_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.father_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.father_ocupation')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.Mother_ocupation')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.father_address')
                            </th>
                            <th class="text-left">
                                @lang('crud.birth_certificates.inputs.Mother_address')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($birthCertificates as $birthCertificate)
                        <tr>
                            <td>
                                {{ optional($birthCertificate->baby)->name ??
                                '-' }}
                            </td>
                            <td>
                                {{ $birthCertificate->date_of_birth ?? '-' }}
                            </td>
                            <td>{{ $birthCertificate->Hospital ?? '-' }}</td>
                            <td>
                                {{ optional($birthCertificate->mother)->name ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($birthCertificate->father)->name ??
                                '-' }}
                            </td>
                            <td>
                                {{ $birthCertificate->father_ocupation ?? '-' }}
                            </td>
                            <td>
                                {{ $birthCertificate->Mother_ocupation ?? '-' }}
                            </td>
                            <td>
                                {{ $birthCertificate->father_address ?? '-' }}
                            </td>
                            <td>
                                {{ $birthCertificate->Mother_address ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $birthCertificate)
                                    <a
                                        href="{{ route('birth-certificates.edit', $birthCertificate) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $birthCertificate)
                                    <a
                                        href="{{ route('birth-certificates.show', $birthCertificate) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $birthCertificate)
                                    <form
                                        action="{{ route('birth-certificates.destroy', $birthCertificate) }}"
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
                            <td colspan="10">
                                {!! $birthCertificates->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
