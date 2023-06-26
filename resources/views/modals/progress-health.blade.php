@push('modals')
<div class="modal fade" id="progress_health">
        <div class="modal-dialog">
          <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add  {{$baby->name ?? '-'}} Development </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
            <div class="modal-body">
      @php $editing = isset($babyProgressHealthReport) @endphp
      <x-form
      method="POST"
      action="{{ route('baby-progress-health-reports.store') }}"
      class="mt-4" >
      @csrf
    {{-- form inputs  --}}
    <div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.hidden name="baby_id" :value="old('baby_id', ($editing ? $babyProgressHealthReport->baby_id : $baby->id))"></x-inputs.hidden>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="age_per_month"
            label="Current Age (in months)"
            :value="old('age_per_month', ($editing ? $babyProgressHealthReport->age_per_month : ''))"
            max="255"
            step="1"
            placeholder="Age"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            id="heightInput"
            name="height"
            label="Current Height (in cm))"
            :value="old('height', ($editing ? $babyProgressHealthReport->height : ''))"
            max="255"
            step="0.01"
            placeholder="Current Height"
            
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
           id="weightInput"
            name="weight"
            label="Current Weight (in kg)"
            :value="old('weight', ($editing ? $babyProgressHealthReport->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Current Weight"
            
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="head_circumference"
            label="Current Head Circumference (in cm)"
            :value="old('head_circumference', ($editing ? $babyProgressHealthReport->head_circumference : ''))"
            max="255"
            step="0.01"
            placeholder="Current head_circumference"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
           id="bmiInput"
            name="bmi"
            label="Bmi"
            :value="old('bmi', ($editing ? $babyProgressHealthReport->bmi : ''))"
            max="255"
            step="0.01"
            
            readonly
        ></x-inputs.number>
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
<script>
 
    $(function() {
  var heightInput = $('input[name="height"]');
  var weightInput = $('input[name="weight"]');
  var bmiInput = $('input[name="bmi"]');

  function calculateBMI() {
     var height = parseFloat(heightInput.val());
     var weight = parseFloat(weight = weightInput.val());
    var bmi = weight / ((height/100) * (height/100));
    bmiInput.val(bmi.toFixed(2));
  }

  

  heightInput.on('change keyup', calculateBMI);
  weightInput.on('change keyup', calculateBMI);

  calculateBMI(); // Calculate initial BMI
});

</script>
@endpush