@php $editing = isset($insurance) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="provider_name"
            label="Provider Name"
            :value="old('provider_name', ($editing ? $insurance->provider_name : ''))"
            maxlength="255"
            placeholder="Provider Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="insurance_name"
            label="Insurance Name"
            :value="old('insurance_name', ($editing ? $insurance->insurance_name : ''))"
            maxlength="255"
            placeholder="Insurance Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="policy_number"
            label="Policy Number"
            :value="old('policy_number', ($editing ? $insurance->policy_number : ''))"
            maxlength="255"
            placeholder="Policy Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="contact"
            label="Contact"
            :value="old('contact', ($editing ? $insurance->contact : ''))"
            maxlength="255"
            placeholder="Contact"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
