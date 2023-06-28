@php $editing = isset($mother) @endphp

<div class="row">
    <div class="col-sm-6">
         <div class="row">
            <div class="col-sm-12">
                <h3>Mother Info's</h3>
            </div>
        </div>
        <x-inputs.hidden
            name="clinic_id"
            :value="old('clinic_id', ($editing ? $mother->clinic_id : $clinic->id))"
        ></x-inputs.hidden>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $mother->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="blood_type_id" label="Blood Type" required>
            @php $selected = old('blood_type_id', ($editing ? $mother->blood_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Blood Type</option>
            @foreach($bloodTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="dob"
            label="Dob"
            value="{{ old('dob', ($editing ? optional($mother->dob)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $mother->phone : ''))"
            maxlength="255"
            placeholder="Phone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $mother->address : ''))"
            maxlength="255"
            placeholder="Address"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="insurance_info" label="Insurance Info">
            @php $selected = old('insurance_info', ($editing ? $mother->insurance_info : 'No')) @endphp
            <option value="No" {{ $selected == 'No' ? 'selected' : '' }} >No</option>
            <option value="Yes" {{ $selected == 'Yes' ? 'selected' : '' }} >Yes</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="occupation"
            label="Occupation"
            :value="old('occupation', ($editing ? $mother->occupation : ''))"
            maxlength="255"
            placeholder="Occupation"
        ></x-inputs.text>
    </x-inputs.group>
    </div>
    {{-- //father form  --}}
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <h3>Father Info's</h3>
            </div>
        </div>

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="f_name"
            label="Father Name"
            :value="old('f_name')"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="f_dob"
            label="Father Date of birth"
            value="{{ old('f_dob') }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="f_phone"
            label="Father Phone"
            :value="old('f_phone')"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="f_address"
            label="Father Address"
            :value="old('f_address')"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="f_occupation"
            label="Father Occupation"
            :value="old('f_occupation')"
            maxlength="255"
            placeholder="Occupation"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

    </div>
    
</div>
