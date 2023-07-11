@push('modals')
<div class="modal fade" id="schedule_time">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Set schedule Time</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <div class="modal-body">
      @php $editing = isset($scheduleTime) @endphp
      <x-form
      method="POST"
      action="{{ route('scheduletime.set') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}
    <div class="row">

    <x-inputs.group class="col-sm-12">
        <x-inputs.time
            id="time"
            name="time"
            label="Set schedule time (UTC +3)"
            :value="old('time', ($editing ? $scheduleTime->time : ''))"
            placeholder="set time"
            required
        ></x-inputs.time>
    </x-inputs.group>
</div>
<div class="modal-footer justify-content-between">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        set time
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