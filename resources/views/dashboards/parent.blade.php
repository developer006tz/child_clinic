<div class="container-fluid">
    @php $mother = \App\Models\Mother::where('user_id',auth()->user()->id)->first() @endphp
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ Auth::user()->name?? '-' }}</h3>

                                <p>Your Profile</p>
                            </div>
                            <div class="icon">
                                <i class="icon fa fa-user"></i>

                            </div>
                            <a href="{{route('mothers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count($mother->babies) ?? '-' }}<sup style="font-size: 20px"></sup></h3>

                                <p>Baby</p>
                            </div>
                            <div class="icon">
                                <i class='fas fa-baby'></i>
                            </div>
                            <a href="{{route('babies.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                   
                    <!-- ./col -->
                </div>
            </div>
