@extends('main')
@section('content')

<livewire:task-page />    

@endsection

{{-- @section('pagescripts')
<script>
$(document).ready(function(){
    $(document).on('click','.editPatient', function(){
        var patient_id = $(this).val();
        console.log(patient_id);

        // $.ajax({
        //     type:"GET",
        //     url:"edit-patient-id/".patient_id,
        //     success: function(response){
        //         console.log(response.patient);
        //         console.log(response);
        //     }
        // });
        ########################################################################################################################################################
        // AJAX did not work with current template files so added livewire
        ########################################################################################################################################################
    });

});

</script>
@endsection --}}