@php $editing = isset($babyVaccination) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" @class('select2') required>
            @php $selected = old('baby_id', ($editing ? $babyVaccination->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vacination_id" label="Vacination" @class('select2') required>
            @php $selected = old('vacination_id', ($editing ? $babyVaccination->vacination_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Vacination</option>
            @foreach($vacinations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_of_vaccine"
            label="Date Of Vaccine"
            value="{{ old('date_of_vaccine', ($editing ? optional($babyVaccination->date_of_vaccine)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="reaction_occured"
            label="Reaction Occured"
            :value="old('reaction_occured', ($editing ? $babyVaccination->reaction_occured : ''))"
            maxlength="255"
            placeholder="Reaction Occured"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="is_vaccinated" label="Is Vaccinated">
            @php $selected = old('is_vaccinated', ($editing ? $babyVaccination->is_vaccinated : 'No')) @endphp
            <option value="Yes" {{ $selected == 'Yes' ? 'selected' : '' }} >Yes</option>
            <option value="No" {{ $selected == 'No' ? 'selected' : '' }} >No</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
