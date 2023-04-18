@php $editing = isset($composeSms) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="message_template_id" label="Message Template">
            @php $selected = old('message_template_id', ($editing ? $composeSms->message_template_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Message Template</option>
            @foreach($messageTemplates as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="custom_message"
            label="Custom Message"
            maxlength="255"
            >{{ old('custom_message', ($editing ? $composeSms->custom_message :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
