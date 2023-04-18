@php $editing = isset($prenatalApointment) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="pregnant_id" label="Pregnant" required>
            @php $selected = old('pregnant_id', ($editing ? $prenatalApointment->pregnant_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Pregnant</option>
            @foreach($pregnants as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($prenatalApointment->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="time"
            label="Time"
            :value="old('time', ($editing ? $prenatalApointment->time : ''))"
            maxlength="255"
            placeholder="Time"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
