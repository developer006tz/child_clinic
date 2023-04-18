@php $editing = isset($clinic) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $clinic->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="location"
            label="Location"
            :value="old('location', ($editing ? $clinic->location : ''))"
            maxlength="255"
            placeholder="Location"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="registration_number"
            label="Registration Number"
            :value="old('registration_number', ($editing ? $clinic->registration_number : ''))"
            maxlength="255"
            placeholder="Registration Number"
        ></x-inputs.text>
    </x-inputs.group>
</div>
