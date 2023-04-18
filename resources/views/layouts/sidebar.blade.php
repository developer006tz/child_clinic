<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">CLINIC-CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon  ion ion-md-body"></i>
                        <p>
                            Baby
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', App\Models\Baby::class)
                            <li class="nav-item">
                                <a href="{{ route('babies.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>List babies</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyDevelopmentMilestone::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-development-milestones.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Milestones</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyMedicalHostory::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-medical-hostories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Medical History</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyProgressHealthReport::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-progress-health-reports.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Progress Health</p>
                                </a>
                            </li>
                        @endcan
                        @can('view-any', App\Models\BabyVaccination::class)
                            <li class="nav-item">
                                <a href="{{ route('baby-vaccinations.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Vaccinations</p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
                    @can('view-any', App\Models\Father::class)
                        <li class="nav-item">
                            <a href="{{ route('fathers.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-pulse"></i>
                                <p>Fathers</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Pregnant::class)
                        <li class="nav-item">
                            <a href="{{ route('pregnants.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Pregnants</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\PregnantComplications::class)
                        <li class="nav-item">
                            <a href="{{ route('all-pregnant-complications.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>All Pregnant Complications</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Card::class)
                        <li class="nav-item">
                            <a href="{{ route('cards.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Cards</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Vacination::class)
                        <li class="nav-item">
                            <a href="{{ route('vacinations.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Vacinations</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\PrenatalApointment::class)
                        <li class="nav-item">
                            <a href="{{ route('prenatal-apointments.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Prenatal Apointments</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\BloodType::class)
                        <li class="nav-item">
                            <a href="{{ route('blood-types.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Blood Types</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Clinic::class)
                        <li class="nav-item">
                            <a href="{{ route('clinics.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Clinics</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\MotherMedicalHistory::class)
                        <li class="nav-item">
                            <a href="{{ route('mother-medical-histories.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Mother Medical Histories</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\MotherHealthStatus::class)
                        <li class="nav-item">
                            <a href="{{ route('mother-health-statuses.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Mother Health Statuses</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\BirthCertificate::class)
                        <li class="nav-item">
                            <a href="{{ route('birth-certificates.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Birth Certificates</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Desease::class)
                        <li class="nav-item">
                            <a href="{{ route('deseases.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Deseases</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Insurance::class)
                        <li class="nav-item">
                            <a href="{{ route('insurances.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Insurances</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\MessageTemplate::class)
                        <li class="nav-item">
                            <a href="{{ route('message-templates.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Message Templates</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\ComposeSms::class)
                        <li class="nav-item">
                            <a href="{{ route('all-compose-sms.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>All Compose Sms</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Schedule::class)
                        <li class="nav-item">
                            <a href="{{ route('schedules.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Schedules</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Sms::class)
                        <li class="nav-item">
                            <a href="{{ route('all-sms.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>All Sms</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Mother::class)
                        <li class="nav-item">
                            <a href="{{ route('mothers.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Mothers</p>
                            </a>
                        </li>
                    @endcan

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Access Management
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth

                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                        <i class="nav-icon icon ion-md-help-circle-outline"></i>
                        <p>Docs</p>
                    </a>
                </li>

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
