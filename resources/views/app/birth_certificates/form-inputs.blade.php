@php $editing = isset($birthCertificate) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="baby_id" label="Baby" required>
            @php $selected = old('baby_id', ($editing ? $birthCertificate->baby_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Baby</option>
            @foreach($babies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_of_birth"
            label="Date Of Birth"
            value="{{ old('date_of_birth', ($editing ? optional($birthCertificate->date_of_birth)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Hospital"
            label="Hospital"
            :value="old('Hospital', ($editing ? $birthCertificate->Hospital : ''))"
            maxlength="255"
            placeholder="Hospital"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="mother_id" label="Mother">
            @php $selected = old('mother_id', ($editing ? $birthCertificate->mother_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Mother</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="father_id" label="Father">
            @php $selected = old('father_id', ($editing ? $birthCertificate->father_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Father</option>
            @foreach($fathers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="father_ocupation"
            label="Father Ocupation"
            :value="old('father_ocupation', ($editing ? $birthCertificate->father_ocupation : ''))"
            maxlength="255"
            placeholder="Father Ocupation"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Mother_ocupation"
            label="Mother Ocupation"
            :value="old('Mother_ocupation', ($editing ? $birthCertificate->Mother_ocupation : ''))"
            maxlength="255"
            placeholder="Mother Ocupation"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="father_address"
            label="Father Address"
            :value="old('father_address', ($editing ? $birthCertificate->father_address : ''))"
            maxlength="255"
            placeholder="Father Address"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Mother_address"
            label="Mother Address"
            :value="old('Mother_address', ($editing ? $birthCertificate->Mother_address : ''))"
            maxlength="255"
            placeholder="Mother Address"
        ></x-inputs.text>
    </x-inputs.group>
</div>
