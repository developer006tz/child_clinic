@php $editing = isset($composeSms) @endphp

<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <h2>SEND SCHEDULE MESSAGE</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form">
            <div class="form-group">
                  <label>Date range button:</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>

            </div>
        </form>
            </div>
        </div>

        
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <h2>SEND CUSTOM SMS</h2>
            </div>
        </div>
       <x-inputs.group class="col-sm-12">
        <div class="select2-success">
        <x-inputs.select name="mother_id" label="Mother" class="select2" multiple="multiple" data-placeholder="Select Mother" data-dropdown-css-class="select2-success" style="width: 100%;" required>
            @php $selected = old('mother_id', ($editing ? $motherMedicalHistory->mother_id : '')) @endphp
            <option   value="0">All mothers</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="custom_message"
            label="Custom Message"
            maxlength="255"
            >{{ old('custom_message', ($editing ? $composeSms->custom_message :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
    </div>
    
</div>
