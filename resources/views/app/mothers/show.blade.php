{{-- ************************************************************************************** --}}

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 profile">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('assets/images/baby.png') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $mother->name ?? '-' }}</h3>

                    <p class="text-muted text-center">Mother</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Dob</b> <a class="float-right">{{ $mother->dob ?? '-' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right">{{ $mother->phone ?? '-' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Father</b> <a class="float-right">{{ optional($mother->father)->name ?? '-' }}</a>
                        </li>
                    </ul>
                    @can('update', $mother)
                    <a href="{{ route('mothers.edit', $mother) }}" class="btn btn-success btn-block"><b> <i class="icon ion-md-create"></i> edit</b></a>
                        @endcan
                </div>
            </div>
        </div>
<div class="col-md-9" id="all-info">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link nine active" href="#pregnances" data-toggle="tab">Mother Pregnances</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#pregnancy_complications" data-toggle="tab">Pregnancy Complications</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#appointments" data-toggle="tab">Appointments</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#medical" data-toggle="tab">Medical History</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#health" data-toggle="tab">Health Statues</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#father_details" data-toggle="tab">Father Details</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">

                <div class="active tab-pane" id="pregnances">
                    <div class="post">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Mother Pregnancies Histories</h3>
                            </div>
                            <div class="card-body">
                                {{-- //mother pregnances table  --}}
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>pregnancy Due date</th>
                                                <th>Estimated Date of delivery</th>
                                                <th>Time of Delivery</th>
                                                <th>Number of week lasted</th>
                                                <th>Child Gender</th>
                                                <th>pregnancy Defects</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($mother->pregnants as $pregnancy)
                                            <tr>
                                                <td>{{ $pregnancy->due_date ?? '-' }}</td>
                                                <td>{{ $pregnancy->date_of_delivery ?? '-' }}</td>
                                                <td>{{ $pregnancy->time_of_delivery ?? '-' }}</td>
                                                <td>{{ $pregnancy->number_of_weeks_lasted ?? '-' }}</td>
                                                <td>{{ $pregnancy->gender ?? '-' }}</td>
                                                <td>{{ $pregnancy->pregnant_defects ?? '-' }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">No Pregnancies Found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="pregnancy_complications">
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-3">
                            @can('view-any', App\Models\PregnantComplications::class)
                            @forelse($mother->pregnants as $pregnancy)
                                @forelse ($pregnancy->allPregnantComplications as $complication)
                                <div class="edit-btn d-flex justify-content-between">
                                    <div class="label">{{$complication->name ?? '-'}}</div>
                                     <a href="#pregnancy_complications_modal" class="btn btn-success btn-block" data-toggle="modal" data-target="#pregnancy_complications_modal_edit"><b> <i class="icon ion-md-create"></i> Add</b></a>
                                </div>
                                @empty
                                    <a href="#pregnancy_complications_modal" class="btn btn-success btn-block" data-toggle="modal" data-target="#pregnancy_complications_modal_add"><b> <i class="icon ion-md-create"></i> Add</b></a>
                                @endforelse
                            @empty 
                            <span>__</span>
                            @endforelse
                            @endcan
                        </div>
                        
                    </div>
                    <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Mother Pregnancies Complications</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Complication</th>
                                                <th>Complication Description</th>
                                                <th>Complication Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($mother->pregnants as $pregnancy)
                                            @forelse ($pregnancy->allPregnantComplications as $complication)
                                             <tr>
                                                <td>{{ $complication->name ?? '-' }}</td>
                                                <td>{{ $complication->description ?? '-' }}</td>
                                                <td>{{ $complication->created_at ?? '-' }}</td>
                                            </tr>
                                            @empty
                                                <td colspan="3">No Complications Found</td>
                                            @endforelse
                                            @empty 
                                            <td colspan="3">No Complications Found</td>
                                            @endforelse

                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="appointments">
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('view-any', App\Models\PrenatalApointment::class)
                            <a href="#vaccine" class="btn btn-success btn-block" data-toggle="modal" data-target="#vaccination_modal"><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 30%">Date</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        prenatal appointments for mother
                        @forelse($mother->prenatalAppointments as $appointment)
                        <tr>
                            <td>{{ $appointment->date ?? '-' }}</td>
                            <td>{{ $appointment->time ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">No Appointments Found</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="medical">
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                              @can('view-any', App\Models\MotherMedicalHistory::class)
                            <a href="#medical-history" class="btn btn-success btn-block" data-toggle="modal" data-target="#medical_history" ><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30%">illness</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>Illness status</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- mother medical history --}}
                            @forelse($mother->motherMedicalHistories as $history)
                            <tr>
                                <td>{{ $history->illness ?? '-' }}</td>
                                <td>{{ $history->description ?? '-' }}</td>
                                <td>{{ $history->date ?? '-' }}</td>
                                <td>{{ $history->status ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No Medical History Found</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="health">
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('view-any', App\Models\MotherHealthStatus::class)
                            <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#progress_health" ><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>

                        <div class="row">
                            {{-- create mother health status table here --}}
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 30%">Date</th>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>HIV Status</th>
                                        <th>Desease</th>
                                        <th>Health Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- mother health status --}}
                                    @forelse($mother->motherHealthStatuses as $status)
                                    <tr>
                                        <td>{{ $status->weight ?? '-' }}</td>
                                        <td>{{ $status->height ?? '-' }}</td>
                                        <td>{{ $status->hiv_status ?? '-' }}</td>
                                        <td>{{ $status->desease->name ?? '-' }}</td>
                                        <td>{{ $status->health_status ?? '-' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Health Status Found</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                        </div>
                    </div>
            </div>


         <div class="tab-pane" id="father_details">
                    <!-- The timeline -->
                    <div class="row">
                        {{-- father details table  --}}
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 30%">Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Occupation</th>
                                    <th>Date of Birth</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- father details --}}
                                @forelse($mother->fatherDetails as $father)
                                <tr>
                                    <td>{{ $father->name ?? '-' }}</td>
                                    <td>{{ $father->phone ?? '-' }}</td>
                                    <td>{{ $father->address ?? '-' }}</td>
                                    <td>{{ $father->occupation ?? '-' }}</td>
                                    <td>{{ $father->education ?? '-' }}</td>
                                    <td>{{ $father->religion ?? '-' }}</td>
                                    <td>{{ $father->tribe ?? '-' }}</td>
                                    <td>{{ $father->age ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No Father Details Found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
</div>
</div>
</div>

 
@endsection

