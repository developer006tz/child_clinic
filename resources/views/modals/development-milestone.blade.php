@push('modals')
<div class="modal fade" id="milestone_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Vaccine History for{{$baby->name ?? '-'}} </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      @php $editing = isset($babyDevelopmentMilestone) @endphp
      <x-form
      method="POST"
      action="{{ route('baby-development-milestones.store') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}

<div class="row">
 <x-inputs.hidden name="baby_id" :value="old('baby_id', ($editing ? $babyDevelopmentMilestone->baby_id : $baby->id))"></x-inputs.hidden>
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_smile"
            label="First Smile"
            value="{{ old('first_smile', ($editing ? optional($babyDevelopmentMilestone->first_smile)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_word"
            label="First Word"
            value="{{ old('first_word', ($editing ? optional($babyDevelopmentMilestone->first_word)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_step"
            label="First Step"
            value="{{ old('first_step', ($editing ? optional($babyDevelopmentMilestone->first_step)->format('Y-m-d') : '')) }}"
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



      {{-- //editing modal  --}}

      <div class="modal fade" id="editing_milestone_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Milestone History for{{$baby->name ?? '-'}} </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @php $babyDevelopmentMilestone = \App\Models\BabyDevelopmentMilestone::where('baby_id',$baby->id)->first() @endphp
      @php $updating = isset($babyDevelopmentMilestone) @endphp
      <x-form
      method="PUT"
      action="{{ route('baby-development-milestones.update',$babyDevelopmentMilestone) }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}

<div class="row">
 <x-inputs.hidden name="baby_id" :value="old('baby_id', ($updating ? $babyDevelopmentMilestone->baby_id : $baby->id))"></x-inputs.hidden>
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_smile"
            label="First Smile"
            value="{{ old('first_smile', ($updating ? optional($babyDevelopmentMilestone->first_smile)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_word"
            label="First Word"
            value="{{ old('first_word', ($updating ? optional($babyDevelopmentMilestone->first_word)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="first_step"
            label="First Step"
            value="{{ old('first_step', ($updating ? optional($babyDevelopmentMilestone->first_step)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
<div class="modal-footer justify-content-between">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        update
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