@php $editing = isset($pregnantComplications) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="pregnant_id" label="Pregnant" required>
            @php $selected = old('pregnant_id', ($editing ? $pregnantComplications->pregnant_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Pregnant</option>
            @foreach($pregnants as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $pregnantComplications->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ?
            $pregnantComplications->description : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
