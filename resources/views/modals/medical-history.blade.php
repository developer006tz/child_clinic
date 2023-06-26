@push('modals')
@php 
$deseases = \App\Models\Desease::pluck('name', 'id');
@endphp
<div class="modal fade" id="medical_history">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Desease History for{{$baby->name ?? '-'}} </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      <x-form
      method="POST"
      action="{{ route('baby-medical-histories.store') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}
    @php $editing = isset($babyMedicalHistory) @endphp

<div class="row">
<x-inputs.group class="col-sm-12">
    <x-inputs.hidden name="baby_id" :value="old('baby_id', ($editing ? $babyMedicalHistory->baby_id : $baby->id))"></x-inputs.hidden>
    </x-inputs.group>
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="desease_id" label="Desease"  required>
            @php $selected = old('desease_id', ($editing ? $babyMedicalHistory->desease_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Desease</option>
            @foreach($deseases as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="level_of_illness" label="Level Of Illness">
            @php $selected = old('level_of_illness', ($editing ? $babyMedicalHistory->level_of_illness : '')) @endphp
            <option value="normal" {{ $selected == 'normal' ? 'selected' : '' }} >Normal</option>
            <option value="medium" {{ $selected == 'medium' ? 'selected' : '' }} >Medium</option>
            <option value="serious" {{ $selected == 'serious' ? 'selected' : '' }} >Serious</option>
            <option value="very-serious" {{ $selected == 'very-serious' ? 'selected' : '' }} >Very serious</option>
            <option value="icu" {{ $selected == 'icu' ? 'selected' : '' }} >Icu</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $babyMedicalHistory->description
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($babyMedicalHistory->date)->format('Y-m-d') : date('Y-m-d'))) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
<div class="modal-footer justify-content-between">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        add
                    </button>
</div>

                {{-- end form inputs  --}}
            </x-form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endpush