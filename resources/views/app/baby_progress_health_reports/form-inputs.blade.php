@php $editing = isset($babyProgressHealthReport) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" @class('select2') required>
            @php $selected = old('baby_id', ($editing ? $babyProgressHealthReport->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="age_per_month"
            label="Current Age"
            :value="old('age_per_month', ($editing ? $babyProgressHealthReport->age_per_month : ''))"
            max="255"
            step="1"
            placeholder="Age"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height"
            label="Current Height"
            :value="old('height', ($editing ? $babyProgressHealthReport->height : ''))"
            max="255"
            step="0.01"
            placeholder="Current Height"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight"
            label="Current Weight"
            :value="old('weight', ($editing ? $babyProgressHealthReport->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Current Weight"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="head_circumference"
            label="Current Weight"
            :value="old('head_circumference', ($editing ? $babyProgressHealthReport->head_circumference : ''))"
            max="255"
            step="0.01"
            placeholder="Current head_circumference"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="bmi"
            label="Bmi"
            :value="old('bmi', ($editing ? $babyProgressHealthReport->bmi : ''))"
            max="255"
            step="0.01"
            placeholder="Bmi"
        ></x-inputs.number>
    </x-inputs.group>
</div>
