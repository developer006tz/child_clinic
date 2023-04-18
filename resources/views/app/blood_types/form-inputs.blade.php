@php $editing = isset($bloodType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $bloodType->name : ''))"
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
            >{{ old('description', ($editing ? $bloodType->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="rh_factor" label="Rh Factor">
            @php $selected = old('rh_factor', ($editing ? $bloodType->rh_factor : '+')) @endphp
            <option value="+" {{ $selected == '+' ? 'selected' : '' }} ></option>
            <option value="-" {{ $selected == '-' ? 'selected' : '' }} ></option>
        </x-inputs.select>
    </x-inputs.group>
</div>
