<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\DeseaseController;
use App\Http\Controllers\PregnantController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\VacinationController;
use App\Http\Controllers\ComposeSmsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BabyVaccinationController;
use App\Http\Controllers\MessageTemplateController;
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\BabyMedicalHistoryController;
use App\Http\Controllers\PrenatalApointmentController;
use App\Http\Controllers\MotherHealthStatusController;
use App\Http\Controllers\MotherMedicalHistoryController;
use App\Http\Controllers\PregnantComplicationsController;
use App\Http\Controllers\BabyDevelopmentMilestoneController;
use App\Http\Controllers\BabyProgressHealthReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('fathers', FatherController::class);
        Route::resource('pregnants', PregnantController::class);
        Route::get('all-pregnant-complications', [
            PregnantComplicationsController::class,
            'index',
        ])->name('all-pregnant-complications.index');
        Route::post('all-pregnant-complications', [
            PregnantComplicationsController::class,
            'store',
        ])->name('all-pregnant-complications.store');
        Route::get('all-pregnant-complications/create', [
            PregnantComplicationsController::class,
            'create',
        ])->name('all-pregnant-complications.create');
        Route::get('all-pregnant-complications/{pregnantComplications}', [
            PregnantComplicationsController::class,
            'show',
        ])->name('all-pregnant-complications.show');
        Route::get('all-pregnant-complications/{pregnantComplications}/edit', [
            PregnantComplicationsController::class,
            'edit',
        ])->name('all-pregnant-complications.edit');
        Route::put('all-pregnant-complications/{pregnantComplications}', [
            PregnantComplicationsController::class,
            'update',
        ])->name('all-pregnant-complications.update');
        Route::delete('all-pregnant-complications/{pregnantComplications}', [
            PregnantComplicationsController::class,
            'destroy',
        ])->name('all-pregnant-complications.destroy');

        Route::resource('babies', BabyController::class);
        Route::resource(
            'baby-development-milestones',
            BabyDevelopmentMilestoneController::class
        );
        Route::resource(
            'baby-medical-histories',
            BabyMedicalHistoryController::class
        );
        Route::resource(
            'baby-progress-health-reports',
            BabyProgressHealthReportController::class
        );
        Route::resource('baby-vaccinations', BabyVaccinationController::class);
        Route::resource('cards', CardController::class);
        Route::resource('vacinations', VacinationController::class);
        Route::resource(
            'prenatal-apointments',
            PrenatalApointmentController::class
        );
        Route::resource('blood-types', BloodTypeController::class);
        Route::resource('clinics', ClinicController::class);
        Route::resource(
            'mother-medical-histories',
            MotherMedicalHistoryController::class
        );
        Route::resource(
            'mother-health-statuses',
            MotherHealthStatusController::class
        );
        Route::resource(
            'birth-certificates',
            BirthCertificateController::class
        );
        Route::resource('deseases', DeseaseController::class);
        Route::resource('insurances', InsuranceController::class);
        Route::resource('message-templates', MessageTemplateController::class);
        Route::get('all-compose-sms', [
            ComposeSmsController::class,
            'index',
        ])->name('all-compose-sms.index');
        Route::post('all-compose-sms', [
            ComposeSmsController::class,
            'store',
        ])->name('all-compose-sms.store');
        Route::get('all-compose-sms/create', [
            ComposeSmsController::class,
            'create',
        ])->name('all-compose-sms.create');
        Route::get('all-compose-sms/{composeSms}', [
            ComposeSmsController::class,
            'show',
        ])->name('all-compose-sms.show');
        Route::get('all-compose-sms/{composeSms}/edit', [
            ComposeSmsController::class,
            'edit',
        ])->name('all-compose-sms.edit');
        Route::put('all-compose-sms/{composeSms}', [
            ComposeSmsController::class,
            'update',
        ])->name('all-compose-sms.update');
        Route::delete('all-compose-sms/{composeSms}', [
            ComposeSmsController::class,
            'destroy',
        ])->name('all-compose-sms.destroy');

        Route::resource('schedules', ScheduleController::class);
        Route::get('all-sms', [SmsController::class, 'index'])->name(
            'all-sms.index'
        );
        Route::post('all-sms', [SmsController::class, 'store'])->name(
            'all-sms.store'
        );
        Route::get('all-sms/create', [SmsController::class, 'create'])->name(
            'all-sms.create'
        );
        Route::get('all-sms/{sms}', [SmsController::class, 'show'])->name(
            'all-sms.show'
        );
        Route::get('all-sms/{sms}/edit', [SmsController::class, 'edit'])->name(
            'all-sms.edit'
        );
        Route::put('all-sms/{sms}', [SmsController::class, 'update'])->name(
            'all-sms.update'
        );
        Route::delete('all-sms/{sms}', [SmsController::class, 'destroy'])->name(
            'all-sms.destroy'
        );

        Route::resource('users', UserController::class);
        Route::resource('mothers', MotherController::class);
    });
