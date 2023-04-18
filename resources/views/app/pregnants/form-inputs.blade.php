@php $editing = isset($pregnant) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="mother_id" label="Mother" required>
            @php $selected = old('mother_id', ($editing ? $pregnant->mother_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Mother</option>
            @foreach($mothers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="due_date"
            label="Due Date"
            value="{{ old('due_date', ($editing ? optional($pregnant->due_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_of_delivery"
            label="Date Of Delivery"
            value="{{ old('date_of_delivery', ($editing ? optional($pregnant->date_of_delivery)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="time_of_delivery"
            label="Time Of Delivery"
            :value="old('time_of_delivery', ($editing ? $pregnant->time_of_delivery : ''))"
            maxlength="255"
            placeholder="Time Of Delivery"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="number_of_weeks_lasted"
            label="Number Of Weeks Lasted"
            :value="old('number_of_weeks_lasted', ($editing ? $pregnant->number_of_weeks_lasted : ''))"
            max="255"
            placeholder="Number Of Weeks Lasted"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight_at_birth"
            label="Weight At Birth"
            :value="old('weight_at_birth', ($editing ? $pregnant->weight_at_birth : ''))"
            max="255"
            step="0.01"
            placeholder="Weight At Birth"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height_at_birth"
            label="Height At Birth"
            :value="old('height_at_birth', ($editing ? $pregnant->height_at_birth : ''))"
            max="255"
            step="0.01"
            placeholder="Height At Birth"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $pregnant->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="pregnant_defects"
            label="Pregnant Defects"
            maxlength="255"
            required
            >{{ old('pregnant_defects', ($editing ? $pregnant->pregnant_defects
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
