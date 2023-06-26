@push('modals')
@php 
$vacinations = \App\Models\Vacination::pluck('name', 'id');
@endphp
<div class="modal fade" id="vaccination_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Vaccine History for{{$baby->name ?? '-'}} </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      @php $editing = isset($babyVaccination) @endphp
      <x-form
      method="POST"
      action="{{ route('baby-vaccinations.store') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}

<div class="row">
 <x-inputs.hidden name="baby_id" :value="old('baby_id', ($editing ? $babyVaccination->baby_id : $baby->id))"></x-inputs.hidden>
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vacination_id" label="Vacination"  required>
            @php $selected = old('vacination_id', ($editing ? $babyVaccination->vacination_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Vacination</option>
            @foreach($vacinations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_of_vaccine"
            label="Date Of Vaccine"
            value="{{ old('date_of_vaccine', ($editing ? optional($babyVaccination->date_of_vaccine)->format('Y-m-d') : date('Y-m-d'))) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="reaction_occured"
            label="Reaction Occured"
            :value="old('reaction_occured', ($editing ? $babyVaccination->reaction_occured : ''))"
            maxlength="255"
            placeholder="Reaction Occured"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="is_vaccinated" label="Is Vaccinated">
            @php $selected = old('is_vaccinated', ($editing ? $babyVaccination->is_vaccinated : 'No')) @endphp
            <option value="Yes" {{ $selected == 'Yes' ? 'selected' : '' }} >Yes</option>
            <option value="No" {{ $selected == 'No' ? 'selected' : '' }} >No</option>
        </x-inputs.select>
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