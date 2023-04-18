@php $editing = isset($motherHealthStatus) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="mother_id" label="Mother" required>
            @php $selected = old('mother_id', ($editing ? $motherHealthStatus->mother_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Mother</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height"
            label="Height"
            :value="old('height', ($editing ? $motherHealthStatus->height : ''))"
            max="255"
            step="0.01"
            placeholder="Height"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight"
            label="Weight"
            :value="old('weight', ($editing ? $motherHealthStatus->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Weight"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hiv_status" label="Hiv Status">
            @php $selected = old('hiv_status', ($editing ? $motherHealthStatus->hiv_status : 'negative-')) @endphp
            <option value="negative-" {{ $selected == 'negative-' ? 'selected' : '' }} >Negative</option>
            <option value="positive+" {{ $selected == 'positive+' ? 'selected' : '' }} >Positive</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="desease_id" label="Desease">
            @php $selected = old('desease_id', ($editing ? $motherHealthStatus->desease_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Desease</option>
            @foreach($deseases as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="health_status" label="Health Status">
            @php $selected = old('health_status', ($editing ? $motherHealthStatus->health_status : 'Normal')) @endphp
            <option value="Normal" {{ $selected == 'Normal' ? 'selected' : '' }} >Normal</option>
            <option value="Illness" {{ $selected == 'Illness' ? 'selected' : '' }} >Illness</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
