@extends('layouts.app')

@section('content')
<div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Notifications</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Notifications</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-compose-sms.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
            </h4>

            <div class="row">
        <div class="col-sm-6" style="background:rgba(0, 198, 198, 0.057);">
            <div class="row">
            <div class="col-sm-12">
                <h2>SEND SCHEDULE MESSAGE</h2>
            </div>
        </div>
            <x-form
                method="POST"
                action="{{ route('create-schedule.create') }}"
                class="mt-4"
            >

            <x-inputs.group class="col-sm-12">
            <div class="select2-success">
            <x-inputs.select name="schedule" label="Choose schedule" class="select2" data-placeholder="Choose Schedule" data-dropdown-css-class="select2-success" style="width: 100%;">

                @foreach($schedules as $value => $label)
                <option value="{{ $value }}"  >{{ $label }}</option>
                @endforeach
            </x-inputs.select>
            </div>
        </x-inputs.group>

            <div class="form-group">
                  <label>Send by Registered date Range</label>

                  <div class="input-group">
                    <input type="text" name="start_date" id="start_date" readonly>
                    <input type="text" name="end_date" id="end_date" readonly>
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>

            </div>

    <x-inputs.group class="col-sm-12">
        <div class="select2-success">
        <x-inputs.select name="mothers[]" label="Send By Selected Mother(s)" class="select2" multiple="multiple" data-placeholder="Select Mother" data-dropdown-css-class="select2-success" style="width: 100%;">
            <option   value="0">All mothers</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}"  >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
        </div>
    </x-inputs.group>



                <div class="my-4">
                    <button type="submit" class="btn btn-primary float-left">
                        <i class="icon ion-md-save"></i>
                        create schedule
                    </button>
                    <a href="{{route('schedulemessage.view')}}" class="btn btn-secondary float-left ml-4">
                        <i class="icon ion-md-eye"></i>
                        view created schedules
                    </a>
                </div>

            </x-form>

        </div>
        <div class="col-sm-6">
            <div class="row">
            <div class="col-sm-12">
                <h2>SEND CUSTOM SMS</h2>
            </div>
        </div>
            @php $editing = isset($composeSms) @endphp
                <x-form
                method="POST"
                action="{{ route('all-compose-sms.store') }}"
                class="mt-4"
            >

       <x-inputs.group class="col-sm-12">
        <div class="select2-success">
        <x-inputs.select name="mother_id[]" label="Mother" class="select2" multiple="multiple" data-placeholder="Select Mother" data-dropdown-css-class="select2-success" style="width: 100%;" >
            @php $selected = old('mother_id', ($editing ? $motherMedicalHistory->mother_id : '')) @endphp
            <option   value="0">All mothers</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
            <div class="select2-success">
            <x-inputs.select name="schedule_id" label="Choose schedule" class="select2" data-placeholder="Choose Schedule" data-dropdown-css-class="select2-success" style="width: 100%;">
                <option value="" >__select schedule__</option>
                @foreach($schedules as $value => $label)
                <option value="{{ $value }}"  >{{ $label }}</option>
                @endforeach
            </x-inputs.select>
            </div>
        </x-inputs.group>

         <x-inputs.group class="col-sm-12">
            <div class="select2-success">
            <x-inputs.select name="attendance" label="By attendance"  data-placeholder="Choose Schedule" data-dropdown-css-class="select2-success" style="width: 100%;">
                <option value="" >__choose attendance__</option>
                <option value="1">Attended</option>
                <option value="0">Not Attended</option>
            </x-inputs.select>
            </div>
        </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="custom_message"
            label="Message"
            maxlength="255"
            >{{ old('custom_message', ($editing ? $composeSms->custom_message :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <div class="my-4">
    <button type="submit" class="btn btn-primary float-right">
        <i class="icon ion-md-send"></i>
        send
    </button>
</div>

            </x-form>
        </div>
    </div>


        </div>
    </div>

</div>

@endsection
