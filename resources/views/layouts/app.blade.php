<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>CLINIC-CMS</title>
        <!-- Scripts -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
         $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist/js/adminlte.js')}}"></script>
        <script src="{{URL::to('node_modules/alpinejs/builds/cdn.js')}}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
         <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
{{--        datatables--}}
{{--        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" rel="stylesheet">--}}
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/autofill/2.5.3/css/autoFill.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.4.1/css/searchBuilder.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css">
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1"></script>

        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
        <link rel="stylesheet" href="{{URL::to('plugins/select2/css/select2.min.css')}}">
        <script src="{{URL::to('plugins/select2/js/select2.full.min.js')}}"></script>

        <!-- Small Ionicons Fixes for AdminLTE -->
        <style>
        html {
            background-color: #f4f6f9;
        }

        .nav-icon.icon:before {
            width: 25px;
        }
        .btn.btn-success {
            background-color: #20c997!important;
            border: #20c997!important ;
        }

        .btn.btn-primary {
            background-color: #20c997!important;
            border: #20c997!important ;
        }

        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #20c997!important;
        }

        span.select2.select2-container.select2-container--default.select2-container--below.select2-container--focus {
            width: 100% !important;
        }
        span.select2-selection.select2-selection--single {
            width: 100% !important;
        }
        </style>


        @livewireStyles
    </head>

    <body class="sidebar-mini layout-fixed layout-navbar-fixed">
        <div id="app" class="wrapper">
            <div class="main-header">
                @include('layouts.nav')
            </div>

            @include('layouts.sidebar')

            <main class="content-wrapper p-5">
                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @stack('scripts')

        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

        @if (session()->has('success'))
        <script>
            var notyf = new Notyf({dismissible: true})
            notyf.success('{{ session('success') }}')
        </script>
        @endif

        <script>
            /* Simple Alpine Image Viewer */
            document.addEventListener('alpine:init', () => {
                Alpine.data('imageViewer', (src = '') => {
                    return {
                        imageUrl: src,

                        refreshUrl() {
                            this.imageUrl = this.$el.getAttribute("image-url")
                        },

                        fileChosen(event) {
                            this.fileToDataUrl(event, src => this.imageUrl = src)
                        },

                        fileToDataUrl(event, callback) {
                            if (! event.target.files.length) return

                            let file = event.target.files[0],
                                reader = new FileReader()

                            reader.readAsDataURL(file)
                            reader.onload = e => callback(e.target.result)
                        },
                    }
                })
            })
        </script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/autofill/2.5.3/js/dataTables.autoFill.min.js"></script>
        <script src="https://cdn.datatables.net/autofill/2.5.3/js/autoFill.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/keytable/2.8.2/js/dataTables.keyTable.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.3.1/js/dataTables.rowGroup.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>
        <script src="https://cdn.datatables.net/searchbuilder/1.4.1/js/dataTables.searchBuilder.min.js"></script>
        <script src="https://cdn.datatables.net/searchpanes/2.1.2/js/dataTables.searchPanes.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/staterestore/1.2.2/js/dataTables.stateRestore.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable_simple').DataTable({
            });
            $('#myTable').DataTable(
                {
                    "scrollX": true,
                    // "scrollY": 800,
                    "responsive": false,
                    "scrollCollapse": true,
                    "paging": true,
                    "searching": true,
                    "info": true,
                    "ordering": true,
                    "fixedColumns":   {
                        "leftColumns": 1,

                    },
                    "columnDefs": [
                        { "width": "100px", "targets": 0 }
                    ],
                    "dom": 'Bfrtip',
                    "buttons": [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "language": {
                        "lengthMenu": "Display _MENU_ records per page",
                        "zeroRecords": "Nothing found - sorry",
                        "info": "Showing page _PAGE_ of _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    },


                }
            );

                // add select livesearch
                $('.select2').select2();
            

        } );
    </script>


        {{-- <script>
            createGrowthChart();

            function createGrowthChart() {
                // Get the canvas element
                var canvas = document.getElementById('growthChart');
                // Get the growth rate data from the sample card
                var growthData = @php echo json_encode($sampleCard['growth_rate'] ?? '-') @endphp;

                // Extract the weight, length, and head circumference data into separate arrays
                var weightData = [];
                var lengthData = [];
                var headCircumferenceData = [];
                var labels = [];
                for (var key in growthData) {
                    if (growthData.hasOwnProperty(key)) {
                        weightData.push(growthData[key]['weight']);
                        lengthData.push(growthData[key]['length']);
                        headCircumferenceData.push(growthData[key]['head_circumference']);
                        labels.push(key);
                    }
                }

                // Create the chart data object
                var chartData = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Weight',
                            data: weightData,
                            borderColor: 'blue',
                            fill: false
                        },
                        {
                            label: 'Length',
                            data: lengthData,
                            borderColor: 'green',
                            fill: false
                        },
                        {
                            label: 'Head Circumference',
                            data: headCircumferenceData,
                            borderColor: 'red',
                            fill: false
                        }
                    ]
                };

                // Create the chart options object
                var chartOptions = {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Baby Growth Chart'
                    },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Measurement'
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Age (months)'
                            }
                        }]
                    }
                };

                // Create the chart
                var chart = new Chart(canvas, {
                    type: 'line',
                    data: chartData,
                    options: chartOptions
                });
            }

        </script> --}}
        <script>
var ctx = document.getElementById('roadToHealth').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Birth', '2 months', '4 months', '6 months', '9 months', '12 months', '18 months', '24 months', '36 months', '48 months', '60 months'],
        datasets: [{
            label: 'Weight',
            data: [7.2, 8, 10, 13, 15, 18, 20, 24, 28, 35, 42, 48],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            fill: false,
            tension: 0.5
        }, {
            label: 'Length',
            data: [20, 21, 23, 25, 27, 29, 31, 33, 35, 38, 41, 44],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            fill: false,
            tension: 0.5
        }, {
            label: 'Head Circumference',
            data: [14, 14.5, 15, 15.5, 16, 16.5, 17, 17.5, 18, 18.5, 19, 19.5],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            fill: false,
            tension: 0.5
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Road to Health'
        },
        legend: {
            display: true
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



</script>
        @auth
        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
            @can('view-any', Spatie\Permission\Models\Role::class)
        <script>
            var allChecked = false;
            document.getElementById('toggle-checkbox').addEventListener('click', function() {
                var checkboxes = document.querySelectorAll('input[name="permissions[]"]');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = !allChecked;
                }
                allChecked = !allChecked;
            });
        </script>
            @endcan
        @endif
        @endauth
    </body>
</html>
