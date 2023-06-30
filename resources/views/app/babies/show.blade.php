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
                            <b>Dob</b> <a class="float-right">{{ \Carbon\Carbon::parse($baby->birthdate)->format('d/m/Y') ?? '-' }}</a>
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
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-3">

                            
                             @can('create', App\Models\BabyDevelopmentMilestone::class)
                            @if(empty($baby->babyDevelopmentMilestones) || $baby->babyDevelopmentMilestones->count() < 1)
                            <a href="#milestone_modal" class="btn btn-success btn-block" data-toggle="modal" data-target="#milestone_modal"><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endif
                            @endcan

                             @can('update', $baby->babyDevelopmentMilestones)
                            @if(!empty($baby->babyDevelopmentMilestones))
                            <a href="#milestone_modal" class="btn btn-success btn-block" data-toggle="modal" data-target="#editing_milestone_modal"><b> <i class="icon ion-md-create"></i> update record</b></a>
                            @endif
                            @endcan
                          
                        </div>
                        
                    </div>
                    <div class="timeline timeline-inverse">
                        <div class="time-label">
                        <span class="bg-pink">
                           {{__('First Smile')}}
                        </span>
                        </div>
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
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('create', App\Models\BabyVaccination::class)
                            <a href="#vaccine" class="btn btn-success btn-block" data-toggle="modal" data-target="#vaccination_modal"><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
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
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                             @can('create', App\Models\BabyMedicalHistory::class)
                            <a href="#medical-history" class="btn btn-success btn-block" data-toggle="modal" data-target="#medical_history" ><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30%">desease</th>
                                <th>Level of illness</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $baby->babyMedicalHistory as $history)
                                <tr >
                                    <td>{{$history->desease->name ?? '-'}}</td>
                                    <td>{{$history->level_of_illness ?? '-'}}</td>
                                    <td>{{$history->description}}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($history->date)->format('Y-m-d') ?? '-'}}
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
                    <div class="row d-flex justify-content-end mb-2">
                        <div class="col-md-3">
                            @can('create', App\Models\BabyProgressHealthReport::class)
                            <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#progress_health" ><b> <i class="icon ion-md-create"></i> Add</b></a>
                            @endcan
                        </div>
                        
                    </div>
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
            </div>
        </div>
    </div>
</div>
    </div>
    </div>

    @php
    $babyProgressHealthReports = $baby->card_data->sortBy('age_per_month');
    @endphp
    @push('scripts')
      <script>
        let labels = [];
        let weightData = [];
        let colors = [];


         var babyProgressHealthReports = {!! json_encode($babyProgressHealthReports) !!};
    
            for (let i = 0; i < babyProgressHealthReports.length; i++) {
            let report = babyProgressHealthReports[i];
            labels.push(report.age_per_month + " months");
            weightData.push(report.weight);
            if (report.weight < 3) {
                colors.push('red');
            } else if (report.weight >= 3 && report.weight < 4) {
                colors.push('orange');
            } else if (report.weight >= 4 && report.weight < 5) {
                colors.push('gray');
            } else {
                colors.push('green');
            }
        }
        function convertColorsToRgba(colors, opacity) {
    let rgbaColors = [];

    for (let i = 0; i < colors.length; i++) {
        let color = colors[i];

        // Convert color names to rgba values
        if (color === 'red') {
            rgbaColors.push(`rgba(255, 0, 0, ${opacity})`);
        } else if (color === 'orange') {
            rgbaColors.push(`rgba(255, 165, 0, ${opacity})`);
        } else if (color === 'gray') {
            rgbaColors.push(`rgba(128, 128, 128, ${opacity})`);
        } else if (color === 'green') {
            rgbaColors.push(`rgba(0, 128, 0, ${opacity})`);
        }
    }

    return rgbaColors;
}

        const image = new Image();
        var url =  "{{ asset('baby.png') }}";
        image.src = url;

        const plugin = {
        id: 'customCanvasBackgroundImage',
            afterDraw: (chart) => {
                if (image.complete) {
                    const ctx = chart.ctx;
                    const xAxis = chart.scales['x'];
                    const yAxis = chart.scales['y'];
                    const top = yAxis.top;
                    const bottom = yAxis.bottom;
                    xAxis.ticks.forEach((value, index) => {
                        const x = xAxis.getPixelForTick(index);
                        const y = bottom + (top - bottom) / 2 - image.height / 2;
                        ctx.drawImage(image, x, y);
                    });
                } else {
                    image.onload = () => chart.draw();
                }
            }
        };
        var ctx = document.getElementById('roadToHealth').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Weight',
                    data: weightData,
                    borderColor: colors,
                    fill: false,
                    fillColor: colors,
                    fillOpacity: 0.5,
                    backgroundColor: function(ctx) {
                        var weight = weightData[ctx.dataIndex];
                        return colors[ctx.dataIndex];
                    },
                    lineTension: 0.5,
                    pointRadius: 5,
                    pointHoverRadius: 10,
                    pointHitRadius: 30,
                    pointBorderWidth: 7,
                    pointStyle: 'rectRounded',
                    pointBackgroundColor: colors,
                    pointBorderColor: colors,
                    pointHoverBackgroundColor: colors,
                    tension: 0.5,
                },
            {
                    label: '',
                    type: 'bar',
                    data: weightData,
                    borderColor: colors,
                    fill: false,
                    fillColor: colors,
                    fillOpacity: 0.5,
                    backgroundColor: convertColorsToRgba(colors,0.1),
                }]
            },
            plugins: [plugin],
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Road to Health',
                    color: 'green',
                    font: {
                        size: 20,
                        weight: 'bold',
                        family: 'Comic Sans MS',
                        lineHeight: 1.2,
                    },
                    padding: {
                        top: 20, left: 0, right: 0, bottom: 0
                    }
                },
                legend: {
                    display: true
                },
                scales: {
                    x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Age in Month'
                },
                border: {
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: true,
                    drawBorder: true,
                    color: 'black',
                },
                grid: {
                    display: true,
                    offset: false,
                    drawOnChartArea: true,
                    drawTicks: true,
                    drawBorder: true,
                    color: convertColorsToRgba(colors,0.4),
                    fill: false,
                    fillOpacity: 0.2,
                    fillColor: colors,
                    // lineWidth: 190,

                }
            },
                y: {
                     beginAtZero: true,
                display: true,
                title: {
                display: true,
                text: 'Weight in kg'
                },
                }
                },
                backgroundColor: function(ctx) {
                    var weight = weightData[ctx.dataIndex];
                    if (weight < 3) {
                        return 'red';
                    } else if (weight >= 3 && weight < 6) {
                        return 'gray';
                    } else {
                        return 'green';
                    }
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 0,
                        bottom: 20
                    }
                }
            }
        });


document.getElementById("printButton").addEventListener("click", function() {
    printChart();
});

function printChart() {
    var chartArea = document.getElementById('roadToHealth').getContext('2d').canvas;
    var chartImage = chartArea.toDataURL("image/png");
    var printWindow = window.open('', '', 'height=800,width=800'); 
    printWindow.document.write('<html><head><title>Road to Health Chart</title>');
    printWindow.document.write('<style>@media print { h2,h3 { text-align: center; } }</style>');
    printWindow.document.write('</head><body>');

    var img = new Image();
    img.onload = function() {
        printWindow.document.write('<h2>Road to Health Chart</h2>');
        printWindow.document.write('<h3>This chart illustrates the progress towards achieving optimal health.</h3>');
        printWindow.document.write('<img src="' + chartImage + '" width="790" height="500"><br>');
        printWindow.print();
        printWindow.document.close();
    };
    img.src = chartImage;
    
    printWindow.document.write('</body></html>');
}


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
    @endpush

    
 @include('modals.progress-health')
 @include('modals.medical-history')
 @include('modals.vaccine')
 @include('modals.development-milestone')
 @include('modals.edit-development-milestone')
@endsection
