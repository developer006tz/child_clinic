@php $editing = isset($babyMedicalHistory) @endphp

<div class="row">

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" @class('select2') required >
            @php $selected = old('baby_id', ($editing ? $babyMedicalHistory->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>

      


    </x-inputs.group>
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="desease_id" label="Desease"  @class('select2') required>
            @php $selected = old('desease_id', ($editing ? $babyMedicalHistory->desease_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Desease</option>
            @foreach($deseases as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="level_of_illness" label="Level Of Illness">
            @php $selected = old('level_of_illness', ($editing ? $babyMedicalHistory->level_of_illness : '')) @endphp
            <option value="normal" {{ $selected == 'normal' ? 'selected' : '' }} >Normal</option>
            <option value="medium" {{ $selected == 'medium' ? 'selected' : '' }} >Medium</option>
            <option value="serious" {{ $selected == 'serious' ? 'selected' : '' }} >Serious</option>
            <option value="very-serious" {{ $selected == 'very-serious' ? 'selected' : '' }} >Very serious</option>
            <option value="icu" {{ $selected == 'icu' ? 'selected' : '' }} >Icu</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $babyMedicalHistory->description
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($babyMedicalHistory->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
