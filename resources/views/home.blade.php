@extends('layouts.app')

@section('content')
@auth
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if(Auth::user()->hasRole('super-admin'))
            @include('dashboards.super-admin')
            @endif
            @if(Auth::user()->hasRole('parent'))
            @include('dashboards.parent')
            @endif
            @if(Auth::user()->hasRole('staff'))
            @include('dashboards.staff')
            @endif
            
            @endauth
        </section>
        <!-- /.content -->

@endsection
