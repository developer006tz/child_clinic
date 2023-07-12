@push('modals')
    <div class="modal fade" id="add_baby">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Baby</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      <x-form
      method="POST"
      action="{{ route('babies.store') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}

@php $editing = isset($baby_edit) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $baby_edit->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $baby_edit->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="birthdate"
            label="Birthdate"
            value="{{ old('birthdate', ($editing ? optional($baby_edit->birthdate)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight_at_birth"
            label="Weight At Birth"
            :value="old('weight_at_birth', ($editing ? $baby_edit->weight_at_birth : ''))"
            max="255"
            step="0.01"
            placeholder="Weight At Birth"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height_at_birth"
            label="Height At Birth"
            :value="old('height_at_birth', ($editing ? $baby_edit->height_at_birth : ''))"
            step="0.01"
            placeholder="Height At Birth"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="head_circumference"
            label="Head Circumference"
            :value="old('head_circumference', ($editing ? $baby_edit->head_circumference : ''))"
            step="0.01"
            placeholder="Head Circumference"
            required
        ></x-inputs.number>
    </x-inputs.group>
<x-inputs.hidden name="mother_id" :value="old('mother_id', ($editing ? $baby_edit->mother_id : $mother->id))"></x-inputs.hidden>


     <x-inputs.hidden name="father_id" :value="old('father_id', ($editing ? $baby_edit->father_id : $mother->father->id))"></x-inputs.hidden>
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
