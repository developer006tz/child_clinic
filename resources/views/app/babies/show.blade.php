@extends('layouts.app')

@section('content')


<!-- /.col -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 profile">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('assets/images/baby.png') }}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $baby->name ?? '-' }}</h3>

                    <p class="text-muted text-center">Baby</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Dob</b> <a class="float-right">{{ $baby->birthdate ?? '-' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Mother</b> <a class="float-right">{{ optional($baby->mother)->name ?? '-' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Father</b> <a class="float-right">{{ optional($baby->father)->name ?? '-' }}</a>
                        </li>
                    </ul>
                    @can('update', $baby)
                    <a href="{{ route('babies.edit', $baby) }}" class="btn btn-success btn-block"><b> <i class="icon ion-md-create"></i> edit</b></a>
                        @endcan
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
<div class="col-md-9" id="all-info">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link nine active" href="#baby_birth_info" data-toggle="tab">Birth Information</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#milestone" data-toggle="tab">Development Milestone</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#vaccine" data-toggle="tab">Vaccine</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#medical" data-toggle="tab">Medical History</a></li>
                <li class="nav-item"><a class="nav-link nine" href="#health" data-toggle="tab">Progress Health</a></li>
                <li class="nav-item"><a class="nav-link" id="navCard" href="#card" data-toggle="tab">Clinic card</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="baby_birth_info">
                    <!-- Post -->
                    <div class="post">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Baby Birth details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 30%">Name</th>
                                        <th>{{ $baby->name ?? '-' }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr >
                                        <td>Date of Birth</td>
                                        <td>

                                                {{ \Carbon\Carbon::parse($baby->birthdate)->format('Y-m-d') ?? '-' }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Time of Birth</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($baby->birthdate)->format('l H:i:s') ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Weight at birth</td>
                                        <td>
                                            {{ $baby->weight_at_birth ?? '-' }}{{__(' Kg')}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Height at birth</td>
                                        <td>
                                            {{ $baby->height_at_birth ?? '-'}}{{__(' cm')}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Head Circumference at birth</td>
                                        <td>
                                            {{ $baby->head_circumference ?? '-' }}{{__(' cm')}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.post -->



                    <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="milestone">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <div class="time-label">
                        <span class="bg-pink">
                           {{__('First Smile')}}
                        </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="far fa-calendar-alt bg-gray"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i></span>

                                <h3 class="timeline-header"><a href="#">{{$baby->babyDevelopmentMilestones ? \Carbon\Carbon::parse($baby->babyDevelopmentMilestones->first_smile)->format('Y-m-d') :  '-' }}</a></h3>

                            </div>
                        </div>
                        <!-- END timeline item -->

                        <!-- timeline time label -->
                        <div class="time-label">
                        <span class="bg-success">
                          First Word
                        </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="far fa-calendar-alt bg-gray"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i></span>
                                <h3 class="timeline-header"><a href="#">{{$baby->babyDevelopmentMilestones ? \Carbon\Carbon::parse($baby->babyDevelopmentMilestones->first_word)->format('Y-m-d') :  '-' }}</a></h3>
                            </div>
                        </div>
                        <!-- END timeline item -->

                        <!-- timeline time label -->
                        <div class="time-label">
                        <span class="bg-info">
                          First Step
                        </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="far fa-calendar-alt bg-gray"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i></span>
                                <h3 class="timeline-header"><a href="#">{{$baby->babyDevelopmentMilestones ? \Carbon\Carbon::parse($baby->babyDevelopmentMilestones->first_step)->format('Y-m-d') :  '-' }}</a></h3>
                            </div>
                        </div>
                        <!-- END timeline item -->
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="vaccine">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 30%">Vaccination name</th>
                            <th>Date Vaccinated</th>
                            <th>Reaction Occurred</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $baby->babyVaccinations as $vaccine)
                        <tr >
                            <td>{{$vaccine->vacination->name}}</td>
                            <td>{{ \Carbon\Carbon::parse($vaccine->date_of_vaccine)->format('Y-m-d') ?? '-'}}</td>
                            <td>{{$vaccine->reaction_occured}}</td>
                            <td>
                                {{$vaccine->is_vaccinated}}
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" @class('text-center') >
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.tab-pane -->

{{--                vaccine tabpane--}}
                <!-- /.tab-pane -->
                <div class="tab-pane" id="medical">
                    <!-- The timeline -->
                    <div class="">
                        <!-- timeline time label -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30%">Vaccination name</th>
                                <th>Date Vaccinated</th>
                                <th>Reaction Occurred</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $baby->babyVaccinations as $vaccine)
                                <tr >
                                    <td>{{$vaccine->vacination->name}}</td>
                                    <td>{{ \Carbon\Carbon::parse($vaccine->date_of_vaccine)->format('Y-m-d') ?? '-'}}</td>
                                    <td>{{$vaccine->reaction_occured}}</td>
                                    <td>
                                        {{$vaccine->is_vaccinated}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" @class('text-center') >
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="health">
                    <div class="timeline timeline-inverse">
                        <!-- timeline time label -->

                        @forelse($baby->babyProgressHealthReports->sortBy('age_per_month') as $report)
                            @php
                                if (!empty($report)) {
                                  $weight = (float)$report->weight;
                                  $time = (int)$report->age_per_month;
                                  $class = ($weight < 3 && $time <= 2) ? 'red' : (($weight < 3.1 && $time <= 2) ? 'grey' : (($weight >= 3.2 && $time < 2) ? 'green' : 'blue'));
                                }
                                @endphp
                            <div class="time-label">
                        <span class="bg-{{$class}}">
                           {{$report->age_per_month ?? '-'}} {{__('Months')}}
                        </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="far fa-calendar-alt bg-gray"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-info"></i></span>

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 30%">Height (cm)</th>
                                            <th>Weight (kg)</th>
                                            <th>Head circumference (cm)</th>
                                            <th>BMI</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$report->height ?? '-'}}</td>
                                            <td>{{$report->weight ?? '-'}}</td>
                                            <td>{{$report->head_circumference ?? '-'}}</td>
                                            <td>{{$report->bmi ?? '-'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        @empty
                            {{__('--No records--')}}
                        @endforelse

                        <!-- END timeline item -->

                        <!-- END timeline item -->
                    </div>
                </div>

{{--                card--}}
                <!-- /.tab-pane -->
                <div class="tab-pane" id="card">
                    <!-- The timeline -->
                    <button id="printButton">Print</button>
                    <div class="card_wrapper">
                        <div class="title text-center">
                            <h3>ROAD TO HEALTH CHART</h3>
                            <h6>for baby {{ $baby->name ?? '-' }}</h6>
                        </div>
                        <canvas id="roadToHealth"></canvas>
                    </div>
                       
                    
                </div>
                <!-- /.tab-pane -->

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $("li.nav-item a.nav-link#navCard").click(function(){
                $("div.col-md-3.profile").hide();
                $("div.col-md-9#all-info").removeClass("col-md-9").addClass("col-md-12");
            });
            $("li.nav-item a.nav-link:not(#navCard)").click(function(){
                $("div.col-md-3.profile").show();
                $("div.col-md-12#all-info").removeClass("col-md-12").addClass("col-md-9");
            });
        });
    </script>
@endsection
