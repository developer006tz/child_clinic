@php $editing = isset($card) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" required>
            @php $selected = old('baby_id', ($editing ? $card->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="issue_number"
            label="Issue Number"
            :value="old('issue_number', ($editing ? $card->issue_number : ''))"
            maxlength="255"
            placeholder="Issue Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight"
            label="Weight"
            :value="old('weight', ($editing ? $card->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Weight"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height"
            label="Height"
            :value="old('height', ($editing ? $card->height : ''))"
            max="255"
            step="0.01"
            placeholder="Height"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="head_circumference"
            label="Head Circumference"
            :value="old('head_circumference', ($editing ? $card->head_circumference : ''))"
            max="255"
            step="0.01"
            placeholder="Head Circumference"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="apgar_score"
            label="Apgar Score"
            :value="old('apgar_score', ($editing ? $card->apgar_score : ''))"
            max="255"
            placeholder="Apgar Score"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="birth_defects"
            label="Birth Defects"
            :value="old('birth_defects', ($editing ? $card->birth_defects : ''))"
            maxlength="255"
            placeholder="Birth Defects"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="blood_type_id" label="Blood Type" required>
            @php $selected = old('blood_type_id', ($editing ? $card->blood_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Blood Type</option>
            @foreach($bloodTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
