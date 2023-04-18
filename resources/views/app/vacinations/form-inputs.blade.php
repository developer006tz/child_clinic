@php $editing = isset($vacination) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $vacination->name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Type">
            @php $selected = old('type', ($editing ? $vacination->type : '')) @endphp
            <option value="Inactivated" {{ $selected == 'Inactivated' ? 'selected' : '' }} >Inactivated</option>
            <option value="Live-attenuated" {{ $selected == 'Live-attenuated' ? 'selected' : '' }} >Live attenuated</option>
            <option value="mRNA" {{ $selected == 'mRNA' ? 'selected' : '' }} >M rna</option>
            <option value="Subunit" {{ $selected == 'Subunit' ? 'selected' : '' }} >Subunit</option>
            <option value="Toxoid" {{ $selected == 'Toxoid' ? 'selected' : '' }} >Toxoid</option>
            <option value="Viral-vector" {{ $selected == 'Viral-vector' ? 'selected' : '' }} >Viral vector</option>
            <option value="Other" {{ $selected == 'Other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
