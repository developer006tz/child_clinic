@php $editing = isset($desease) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $desease->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Type">
            @php $selected = old('type', ($editing ? $desease->type : 'non-infectious')) @endphp
            <option value="infectious" {{ $selected == 'infectious' ? 'selected' : '' }} >Infectious</option>
            <option value="chronic" {{ $selected == 'chronic' ? 'selected' : '' }} >Chronic</option>
            <option value="mental-illness" {{ $selected == 'mental-illness' ? 'selected' : '' }} >Mental illness</option>
            <option value="aotoimmune" {{ $selected == 'aotoimmune' ? 'selected' : '' }} >Aotoimmune</option>
            <option value="non-infectious" {{ $selected == 'non-infectious' ? 'selected' : '' }} >Non infectious</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $desease->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
