@php $editing = isset($babyProgressHealthReport) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" required>
            @php $selected = old('baby_id', ($editing ? $babyProgressHealthReport->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="current_height"
            label="Current Height"
            :value="old('current_height', ($editing ? $babyProgressHealthReport->current_height : ''))"
            max="255"
            step="0.01"
            placeholder="Current Height"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="current_weight"
            label="Current Weight"
            :value="old('current_weight', ($editing ? $babyProgressHealthReport->current_weight : ''))"
            max="255"
            step="0.01"
            placeholder="Current Weight"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="current_health_status"
            label="Current Health Status"
        >
            @php $selected = old('current_health_status', ($editing ? $babyProgressHealthReport->current_health_status : 'Normal')) @endphp
            <option value="Normal" {{ $selected == 'Normal' ? 'selected' : '' }} >Normal</option>
            <option value="Illness" {{ $selected == 'Illness' ? 'selected' : '' }} >Illness</option>
        </x-inputs.select>
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
