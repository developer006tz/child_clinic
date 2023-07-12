<div class="container-fluid">
                <!-- Small boxes (Stat box) -->
    @php
        $user = Auth::user();
    @endphp
    <div class="row mb-3">
        <div class="col-sm-12 d-flex justify-content-end">
            Welcome <span class="badge badge-success ml-2" > {{Auth::user()->name}} </span> <span class="badge badge-primary ml-2">
                                @forelse ($user->roles as $role)
                    {{ $role->name }},
                @empty - @endforelse
                            </span>
        </div>
    </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($mothers) ?? '-' }}</h3>

                                <p>Mothers</p>
                            </div>
                            <div class="icon">
                                <i class="icon ion-md-people"></i>
                            </div>
                            <a href="{{route('mothers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count($babies) ?? '-' }}<sup style="font-size: 20px"></sup></h3>

                                <p>Babies</p>
                            </div>
                            <div class="icon">
                                <i class='fas fa-baby'></i>
                            </div>
                            <a href="{{route('babies.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ count($pregnants) ?? '-' }}</h3>

                                <p>Pregnants</p>
                            </div>
                            <div class="icon">
                                <i class='fas fa-child'></i>
                            </div>
                            <a href="{{route('pregnants.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ count($users) ?? '-' }}</h3>

                                <p>Staffs</p>
                            </div>
                            <div class="icon">
                                <i class='fas fa-address-card'></i>
                            </div>
                            <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
