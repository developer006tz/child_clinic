<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-teal elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('assets/images/clinic-logo.png')}}" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">CLINIC-CMS</span>
    </a>
    @php
    $settings_routes = ['users.index', 'roles.index', 'permissions.index', 'insurances.index', 'blood-types.index', 'clinics.index', 'deseases.index', 'birth-certificates.index'];
    $isActiveSetting = in_array(request()->route()->getName(), $settings_routes);
    $notification_route = ['message-templates.index','all-compose-sms.index','schedules.index','all-sms.index'];
    $isActiveNotification = in_array(request()->route()->getName(), $notification_route);
    $mother_routes = ['mothers.index','pregnants.index','all-pregnant-complications.index','prenatal-apointments.index','mother-medical-histories.index','mother-health-statuses.index'];
    $isActiveMother = in_array(request()->route()->getName(), $mother_routes);
    /*$baby_routes = ['babies.index','babies.create','babies.edit','baby-development-milestones.index','baby-development-milestones.create','baby-development-milestones.edit','baby-medical-histories.index','baby-medical-histories.create','baby-medical-histories.edit','baby-progress-health-reports.index','baby-progress-health-reports.create','baby-progress-health-reports.edit','baby-vaccinations.index','baby-vaccinations.create','baby-vaccinations.edit'];

    $isActiveBaby = in_array(request()->route()->getName(), $baby_routes);*/

    $routes = ['babies', 'baby-development-milestones', 'baby-medical-histories', 'baby-progress-health-reports', 'baby-vaccinations'];
    $actions = ['index', 'create', 'edit'];
    $baby_routes = [];
    foreach ($routes as $route) {
        foreach ($actions as $action) {
            $baby_routes[] = $route . '.' . $action;
        }
    }
    $isActiveBaby = in_array(request()->route()->getName(), $baby_routes);
    @endphp
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ $isActiveBaby ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActiveBaby ? 'active' : '' }}">
                        <i class="nav-icon icon  ion ion-md-body"></i>
                        <p>
                            Baby
                            <i class="nav-icon right icon ion-md-arrow-dropleft"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', App\Models\Baby::class)
                            <li class="nav-item">
                                <a href="{{ route('babies.index') }}" class="nav-link {{ request()->routeIs('babies.index') ? 'active' : '' }}">
                                    <i class="nav-icon icon ion-logo-reddit"></i>
                                    <p>All babies</p>
                                </a>
                            </li>
                        @endcan
                        {{-- @can('view-any', App\Models\BabyDevelopmentMilestone::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-development-milestones.index') }}" class="nav-link {{ request()->routeIs('baby-development-milestones.index') ? 'active' : '' }}">
                                    <i class="nav-icon icon ion-ios-trending-up"></i>
                                    <p>Milestones</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyMedicalHistory::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-medical-histories.index') }}" class="nav-link {{ request()->routeIs('baby-medical-histories.index') ? 'active' : '' }}">
                                    <i class="nav-icon icon ion-md-medkit"></i>
                                    <p>Medical History</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyProgressHealthReport::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-progress-health-reports.index') }}" class="nav-link {{ request()->routeIs('baby-progress-health-reports.index') ? 'active' : '' }}">
                                    <i class="nav-icon icon ion-md-body"></i>
                                    <p>Progress Health</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyVaccination::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-vaccinations.index') }}" class="nav-link {{ request()->routeIs('baby-vaccinations.index') ? 'active' : '' }}">
                                    <i class="nav-icon icon ion-md-archive"></i>
                                    <p>Vaccine History</p>
                                </a>
                            </li>
                        @endcan --}}

                    </ul>
                </li>
{{--                mother--}}
                    <li class="nav-item {{ $isActiveMother ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ $isActiveMother ? 'active' : '' }}">
                            <i class="nav-icon icon  ion ion-md-female"></i>
                            <p>
                                Mother
                                <i class="nav-icon right icon ion-md-arrow-dropleft"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Mother::class)
                                <li class="nav-item">
                                    <a href="{{ route('mothers.index') }}" class="nav-link {{ request()->routeIs('mothers.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-ios-woman"></i>
                                        <p>Manage Mothers</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Pregnant::class)
                                <li class="nav-item">
                                    <a href="{{ route('pregnants.index') }}" class="nav-link {{ request()->routeIs('pregnants.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-ios-happy"></i>
                                        <p>Pregnants</p>
                                    </a>
                                </li>
                            @endcan
                                @can('view-any', App\Models\PregnantComplications::class)
                                    <li class="nav-item">
                                        <a href="{{ route('all-pregnant-complications.index') }}" class="nav-link {{ request()->routeIs('all-pregnant-complications.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-ios-snow"></i>
                                            <p>Pregnant Complications</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\PrenatalApointment::class)
                                    <li class="nav-item">
                                        <a href="{{ route('prenatal-apointments.index') }}" class="nav-link {{ request()->routeIs('prenatal-apointments.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-time"></i>
                                            <p>Prenatal Apointments</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\MotherMedicalHistory::class)
                                    <li class="nav-item">
                                        <a href="{{ route('mother-medical-histories.index') }}" class="nav-link {{ request()->routeIs('mother-medical-histories.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-medkit"></i>
                                            <p>Medical Histories</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\MotherHealthStatus::class)
                                    <li class="nav-item">
                                        <a href="{{ route('mother-health-statuses.index') }}" class="nav-link {{ request()->routeIs('mother-health-statuses.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-help-circle-outline"></i>
                                            <p>Health Statuses</p>
                                        </a>
                                    </li>
                                @endcan
                        </ul>
                    </li>
{{--                end mother--}}
                    @can('view-any', App\Models\Father::class)
                        <li class="nav-item">
                            <a href="{{ route('fathers.index') }}" class="nav-link {{ request()->routeIs('fathers.index') ? 'active' : '' }}">
                                <i class="nav-icon icon ion-md-male"></i>
                                <p>Fathers</p>
                            </a>
                        </li>
                    @endcan


                    @can('view-any', App\Models\Card::class)
                        <li class="nav-item">
                            <a href="{{ route('cards.index') }}" class="nav-link {{ request()->routeIs('cards.index') ? 'active' : '' }}">
                                <i class="nav-icon icon  ion-ios-card"></i>
                                <p>Clinic Cards</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Vacination::class)
                        <li class="nav-item">
                            <a href="{{ route('vacinations.index') }}" class="nav-link {{ request()->routeIs('vacinations.index') ? 'active' : '' }}">
                                <i class="nav-icon icon ion-md-finger-print"></i>
                                <p> Manage Vaccine</p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item {{ $isActiveNotification ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ $isActiveNotification ? 'active' : '' }}">
                            <i class="nav-icon icon  ion ion-md-notifications"></i>
                            <p>
                                Notifications
                                <i class="nav-icon right icon ion-md-arrow-dropleft"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-any', App\Models\MessageTemplate::class)
                                <li class="nav-item">
                                    <a href="{{ route('message-templates.index') }}" class="nav-link {{ request()->routeIs('message-templates.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Message Templates</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\ComposeSms::class)
                                <li class="nav-item">
                                    <a href="{{ route('all-compose-sms.index') }}" class="nav-link {{ request()->routeIs('all-compose-sms.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>All Compose Sms</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Schedule::class)
                                <li class="nav-item">
                                    <a href="{{ route('schedules.index') }}" class="nav-link {{ request()->routeIs('schedules.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-md-calendar"></i>
                                        <p>Create Schedule</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Sms::class)
                                <li class="nav-item">
                                    <a href="{{ route('all-sms.index') }}" class="nav-link {{ request()->routeIs('all-sms.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-md-chatbubbles"></i>
                                        <p>Sent Sms</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item {{ $isActiveSetting ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActiveSetting ? 'active' : '' }}">
                        <i class="nav-icon icon ion-md-settings"></i>
                        <p>
                            Settings
                            <i class="nav-icon right icon ion-md-arrow-dropleft"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                        <i class="nav-icon icon ion-md-person-add"></i>
                                        <p>Manage Staffs</p>
                                    </a>
                                </li>
                            @endcan
                                @can('view-any', Spatie\Permission\Models\Role::class)
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-body"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('view-any', Spatie\Permission\Models\Permission::class)
                                    <li class="nav-item">
                                        <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-ios-key"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\Insurance::class)
                                    <li class="nav-item">
                                        <a href="{{ route('insurances.index') }}" class="nav-link {{ request()->routeIs('insurances.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-bookmarks"></i>
                                            <p>Insurances</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\BloodType::class)
                                    <li class="nav-item">
                                        <a href="{{ route('blood-types.index') }}" class="nav-link {{ request()->routeIs('blood-types.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-egg"></i>
                                            <p>Blood Types</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\Clinic::class)
                                    <li class="nav-item">
                                        <a href="{{ route('clinics.index') }}" class="nav-link {{ request()->routeIs('clinics.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-ios-ribbon"></i>
                                            <p>Clinics</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\Desease::class)
                                    <li class="nav-item">
                                        <a href="{{ route('deseases.index') }}" class="nav-link {{ request()->routeIs('deseases.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-md-flask"></i>
                                            <p>Deseases</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-any', App\Models\BirthCertificate::class)
                                    <li class="nav-item">
                                        <a href="{{ route('birth-certificates.index') }}" class="nav-link {{ request()->routeIs('birth-certificates.index') ? 'active' : '' }}">
                                            <i class="nav-icon icon ion-ios-albums"></i>
                                            <p>Birth Certificates</p>
                                        </a>
                                    </li>
                                @endcan
                    </ul>
                </li>
                @endif
                @endauth


                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
