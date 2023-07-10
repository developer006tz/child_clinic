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
                             src="{{ asset('assets/images/mother.png') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $mother->name ?? '-' }}</h3>

                    <p class="text-muted text-center">Mother</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Dob</b> <a class="float-right">{{ \Carbon\Carbon::parse($mother->dob)->format('d/m/Y') ?? '-' }}</a>
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
                <li class="nav-item"><a class="nav-link nine active" href="#babies" data-toggle="tab">Babies</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#pregnances" data-toggle="tab">Mother Pregnances</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#appointments" data-toggle="tab">Appointments</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#father_details" data-toggle="tab">Father Details</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">

                <div class="tab-pane" id="pregnances">
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('create', App\Models\Pregnant::class)
                            <a href="#appointment" class="btn btn-success btn-block" data-toggle="modal" data-target="#appoint_modal_add"><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
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
                                                <th>Date registered</th>
                                                <th>Date of Delivery</th>
                                                <th>Time of Delivery</th>
                                                <th>Number of week lasted</th>
                                                <th>Child Gender</th>
                                                <th>pregnancy Defects</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($mother->pregnants as $pregnancy)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($pregnancy->due_date)->format('d/m/Y') ?? '-' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pregnancy->date_of_delivery)->format('d/m/Y') ?? '-' }}</td>
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
                                                <td>{{ \Carbon\Carbon::parse($complication->created_at)->format('d/m/Y') ?? '-' }}</td>
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
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="appointments">
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('view-any', App\Models\PrenatalApointment::class)
                            <a href="#appointment" class="btn btn-success btn-block" data-toggle="modal" data-target="#appoint_modal_add"><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 30%">Appointment Title</th>
                            <th style="width: 20%" >Attend Date</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                            @isset($mother_schedules)
                            @forelse($mother_schedules as $appointment)
                            <tr>
                                <td>{{ $appointment->schedule->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') ?? '-' }}</td>
                                <td>{{ $appointment->message ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No Appointments Found</td>
                            </tr>
                        @endforelse
                        @endisset
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
                                <td>{{ \Carbon\Carbon::parse($history->date)->format('d/m/Y') ?? '-' }}</td>
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

                <div class="tab-pane active" id="babies">
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('view-any', App\Models\Babies::class)
                            <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#progress_health" ><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                    </div>

                        <div class="row">
                            {{-- create mother health status table here --}}
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 30%">Name</th>
                                        <th>Gender</th>
                                        <th>date of Birth</th>
                                        <th>Weight at Birth</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- mother health status --}}
                                    @forelse($mother->babies as $baby)
                                    <tr>
                                        <td>{{ $baby->name ?? '-' }}</td>
                                        <td>{{ $baby->gender ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($baby->birthdate)->format('d/m/Y') ?? '-' }}</td>
                                        <td class="bg-info" >{{ $baby->weight_at_birth.' kg'?? '-' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">No Health Status Found</td>
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
                                    <th>Date of Birth</th>
                                    <th>Phone number</th>
                                    <th>Address</th>
                                    <th>Occupation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <td>{{$mother->father->name ?? '-'}}</td>
                                <td>{{\Carbon\Carbon::parse($mother->father->dob)->format('d/m/Y') ?? '-'}}</td>
                                <td>{{$mother->father->phone ?? '-'}}</td>
                                <td>{{$mother->father->address ?? '-'}}</td>
                                <td>{{$mother->father->occupation ?? '-'}}</td>
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

