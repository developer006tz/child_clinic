@php $editing = isset($babyDevelopmentMilestone) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" required>
            @php $selected = old('baby_id', ($editing ? $babyDevelopmentMilestone->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_smile"
            label="First Smile"
            value="{{ old('first_smile', ($editing ? optional($babyDevelopmentMilestone->first_smile)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_word"
            label="First Word"
            value="{{ old('first_word', ($editing ? optional($babyDevelopmentMilestone->first_word)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_step"
            label="First Step"
            value="{{ old('first_step', ($editing ? optional($babyDevelopmentMilestone->first_step)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
