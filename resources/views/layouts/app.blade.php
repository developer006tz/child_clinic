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
        {{-- <script src="{{URL::to('node_modules/alpinejs/builds/cdn.js')}}" defer></script> --}}
        
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
@stack('scripts')

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
