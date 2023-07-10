@php $editing = isset($schedule) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $schedule->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="message"
            label="Message"
            maxlength="255"
            required
            >{{ old('message', ($editing ? $schedule->message : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_start"
            label="Start Date"
            value="{{ old('date_start', ($editing ? optional($schedule->date_start)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_end"
            label="End Date"
            value="{{ old('date_end', ($editing ? optional($schedule->date_end)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    {{-- <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="time_start"
            label="Time Start"
            :value="old('time_start', ($editing ? $schedule->time_start : ''))"
            maxlength="255"
            placeholder="Time Start"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="time_end"
            label="Time End"
            :value="old('time_end', ($editing ? $schedule->time_end : ''))"
            maxlength="255"
            placeholder="Time End"
            required
        ></x-inputs.text>
    </x-inputs.group> --}}
</div>
