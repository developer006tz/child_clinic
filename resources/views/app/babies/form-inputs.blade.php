@php $editing = isset($baby) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $baby->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $baby->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="birthdate"
            label="Birthdate"
            value="{{ old('birthdate', ($editing ? optional($baby->birthdate)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight_at_birth"
            label="Weight At Birth"
            :value="old('weight_at_birth', ($editing ? $baby->weight_at_birth : ''))"
            max="255"
            step="0.01"
            placeholder="Weight At Birth"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height_at_birth"
            label="Weight At Birth"
            :value="old('height_at_birth', ($editing ? $baby->height_at_birth : ''))"
            max="255"
            step="0.01"
            placeholder="Weight At Birth"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="head_circumference"
            label="Weight At Birth"
            :value="old('head_circumference', ($editing ? $baby->head_circumference : ''))"
            max="255"
            step="0.01"
            placeholder="Weight At Birth"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="mother_id" label="Mother" class="select2" required>
            @php $selected = old('mother_id', ($editing ? $baby->mother_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Mother</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="father_id" class="select2" label="Father" required>
            @php $selected = old('father_id', ($editing ? $baby->father_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Father</option>
            @foreach($fathers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
