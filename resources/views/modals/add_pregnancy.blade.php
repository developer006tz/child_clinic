@push('modals')
    <div class="modal fade" id="add_pregnancy">
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
      action="{{ route('pregnants.store') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}

          @php $editing = isset($pregnant) @endphp

          <div class="row">
              <x-inputs.hidden name="mother_id" :value="old('mother_id', ($editing ? $baby_edit->mother_id : $mother->id))"></x-inputs.hidden>


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
                      label="Estimated Date Of Delivery"
                      value="{{ old('date_of_delivery', ($editing ? optional($pregnant->date_of_delivery)->format('Y-m-d') : '')) }}"
                      max="255"
                  ></x-inputs.date>
              </x-inputs.group>

              <x-inputs.group class="col-sm-12">
                  <x-inputs.time
                      name="time_of_delivery"
                      label="Actual Time Of Delivery (to be filled when mother deliver)"
                      :value="old('time_of_delivery', ($editing ? $pregnant->time_of_delivery : ''))"
                      placeholder="Time Of Delivery"
                  ></x-inputs.time>
              </x-inputs.group>

              <x-inputs.group class="col-sm-12">
                  <x-inputs.number
                      name="number_of_weeks_lasted"
                      label="Number Of Weeks Lasted (to be filled when mother deliver)"
                      :value="old('number_of_weeks_lasted', ($editing ? $pregnant->number_of_weeks_lasted : ''))"
                      max="255"
                      placeholder="Number Of Weeks Lasted"
                  ></x-inputs.number>
              </x-inputs.group>

              <x-inputs.group class="col-sm-12">
                  <x-inputs.number
                      name="weight_at_birth"
                      label="Weight At Birth (to be filled when mother deliver)"
                      :value="old('weight_at_birth', ($editing ? $pregnant->weight_at_birth : ''))"
                      max="255"
                      step="0.01"
                      placeholder="Weight At Birth"
                  ></x-inputs.number>
              </x-inputs.group>

              <x-inputs.group class="col-sm-12">
                  <x-inputs.number
                      name="height_at_birth"
                      label="Height At Birth (cm) (to be filled when mother deliver)"
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
                  >{{ old('pregnant_defects', ($editing ? $pregnant->pregnant_defects
            : '')) }}</x-inputs.textarea
                  >
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
