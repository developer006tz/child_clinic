@php $editing = isset($motherMedicalHistory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="mother_id" label="Mother" required>
            @php $selected = old('mother_id', ($editing ? $motherMedicalHistory->mother_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Mother</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="illnes" label="Illnes">
            @php $selected = old('illnes', ($editing ? $motherMedicalHistory->illnes : 'Other')) @endphp
            <option value="Other" {{ $selected == 'Other' ? 'selected' : '' }} >Other</option>
            <option value="Anaemia" {{ $selected == 'Anaemia' ? 'selected' : '' }} >Anaemia</option>
            <option value="UTI" {{ $selected == 'UTI' ? 'selected' : '' }} >Uti</option>
            <option value="Depression" {{ $selected == 'Depression' ? 'selected' : '' }} >Depression</option>
            <option value="Diabetes" {{ $selected == 'Diabetes' ? 'selected' : '' }} >Diabetes</option>
            <option value="Heart-conditions" {{ $selected == 'Heart-conditions' ? 'selected' : '' }} >Heart conditions</option>
            <option value="Hypertension" {{ $selected == 'Hypertension' ? 'selected' : '' }} >Hypertension</option>
            <option value="Hyperemesis-gravidarum" {{ $selected == 'Hyperemesis-gravidarum' ? 'selected' : '' }} >Hyperemesis gravidarum</option>
            <option value="Infections" {{ $selected == 'Infections' ? 'selected' : '' }} >Infections</option>
            <option value="UIT" {{ $selected == 'UIT' ? 'selected' : '' }} >Uit</option>
            <option value="Anxiety" {{ $selected == 'Anxiety' ? 'selected' : '' }} >Anxiety</option>
            <option value="Malaria" {{ $selected == 'Malaria' ? 'selected' : '' }} >Malaria</option>
            <option value="Cancer" {{ $selected == 'Cancer' ? 'selected' : '' }} >Cancer</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Description"
            label="Description"
            maxlength="255"
            >{{ old('Description', ($editing ?
            $motherMedicalHistory->Description : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($motherMedicalHistory->date)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $motherMedicalHistory->status : '')) @endphp
            <option value="Cured" {{ $selected == 'Cured' ? 'selected' : '' }} >Cured</option>
            <option value="illness" {{ $selected == 'illness' ? 'selected' : '' }} >Illness</option>
            <option value="continuous-illness" {{ $selected == 'continuous-illness' ? 'selected' : '' }} >Continuous illness</option>
            <option value="on-dose" {{ $selected == 'on-dose' ? 'selected' : '' }} >On dose</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
