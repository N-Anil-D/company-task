<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Alergies,Conditions,Kin,Medication,Patient};
use Illuminate\Support\Facades\Validator;


class TaskPage extends Component
{
    #component Variables Start
        public $newPatientData = [];
        public $newAlergieData = [];
        public $newConditionData = [];
        public $newMedicationData = [];
        public $editAblePatientData = [];
        public $editAblePatientKinData = [];
        public $editAbleAlergieInfoData = [];
        public $editAbleConditionInfoData = [];
        public $editAbleMedicationInfoData = [];
        public $patientInfo;
        public $patientKinInfo;
        public $alergieInfo;
        public $conditionInfo;
        public $medicationInfo;
        public $deleteData;
    #component Variables End

    public function render()
    {
        $patients = Patient::get();
        return view('livewire.task-page',['patients' => $patients]);
    }

    #Delete Section Start
    public function deleteModal($id,$modelName){

        if($modelName == "Patient"){
            $this->deleteData = Patient::find($id);
        }elseif ($modelName == "Kin") {
            $this->deleteData = Kin::find($id);
        }elseif ($modelName == "Alergies") {
            $this->deleteData = Alergies::find($id);
        }elseif ($modelName == "Conditions") {
            $this->deleteData = Conditions::find($id);
        }elseif ($modelName == "Medication") {
            $this->deleteData = Medication::find($id);
        }else{
            return;
        }
        $this->dispatch('deleteModalShow');
    }
    public function delete(){
        $this->deleteData->delete();
        $this->dispatch('deleteModalHide');
    }
    #Delete Section End


    #Edit Section Start
    public function editPatientModal($patientId){
        $this->patientInfo = Patient::find($patientId);
        $this->editAblePatientData = [
            'id_card'=>$this->patientInfo->id_card,
            'gender'=>$this->patientInfo->gender,
            'name'=>$this->patientInfo->name,
            'surname'=>$this->patientInfo->surname,
            'date_of_birth'=>$this->patientInfo->date_of_birth,
            'address'=>$this->patientInfo->address,
            'postcode'=>$this->patientInfo->postcode,
            'contact_number_1'=>$this->patientInfo->contact_number_1,
            'contact_number_2'=>$this->patientInfo->contact_number_2,
        ];
        $this->dispatch('patientEditShow');
    }
    public function editPatient(){
        $this->patientInfo->id_card = $this->editAblePatientData['id_card'];
        $this->patientInfo->gender = $this->editAblePatientData['gender'];
        $this->patientInfo->name = $this->editAblePatientData['name'];
        $this->patientInfo->surname = $this->editAblePatientData['surname'];
        $this->patientInfo->date_of_birth = $this->editAblePatientData['date_of_birth'];
        $this->patientInfo->address = $this->editAblePatientData['address'];
        $this->patientInfo->postcode = $this->editAblePatientData['postcode'];
        $this->patientInfo->contact_number_1 = $this->editAblePatientData['contact_number_1'];
        $this->patientInfo->contact_number_2 = $this->editAblePatientData['contact_number_2'];
        $this->patientInfo->save();
        $this->clear();
        $this->dispatch('patientEditHide');
    }

    public function editPatientKinModal($patientKinId){
        $this->patientKinInfo = Kin::find($patientKinId);
        $this->editAblePatientKinData = [
            'id_card'=>$this->patientKinInfo->id_card,
            'name'=>$this->patientKinInfo->name,
            'surname'=>$this->patientKinInfo->surname,
            'contact_number_1'=>$this->patientKinInfo->contact_number_1,
            'contact_number_2'=>$this->patientKinInfo->contact_number_2,
        ];
        $this->dispatch('patientKinEditShow');
    }
    public function editPatientKin(){
        $validateData = Validator::make($this->editAblePatientKinData, [
            'id_card'=> 'required',
            'name'=> 'required',
            'surname'=> 'required',
            'contact_number_1'=> 'required',
            'contact_number_2'=> 'required',
        ])->validate();

        $this->patientKinInfo->id_card = $validateData['id_card'];
        $this->patientKinInfo->name = $validateData['name'];
        $this->patientKinInfo->surname = $validateData['surname'];
        $this->patientKinInfo->contact_number_1 = $validateData['contact_number_1'];
        $this->patientKinInfo->contact_number_2 = $validateData['contact_number_2'];
        $this->patientKinInfo->save();
        $this->clear();
        $this->dispatch('patientKinEditHide');
    }

    public function editAlergieModal($alergiesId){
        $this->alergieInfo = Alergies::find($alergiesId);
        $this->editAbleAlergieInfoData = [
            'name'=>$this->alergieInfo->name,
            'notes'=>$this->alergieInfo->notes,
            'created_at'=>$this->alergieInfo->created_at->format('Y-m-d'),
        ];
        // dd($this->editAbleAlergieInfoData,$this->alergieInfo);
        $this->dispatch('alergieEditShow');
    }
    public function editAlergie(){
        $validateData = Validator::make($this->editAbleAlergieInfoData, [
            'name'=> 'required',
            'notes'=> 'required',
            'created_at'=> 'required',
        ])->validate();

        $this->alergieInfo->name = $validateData['name'];
        $this->alergieInfo->notes = $validateData['notes'];
        $this->alergieInfo->created_at = $validateData['created_at'];
        $this->alergieInfo->save();
        $this->clear();
        $this->dispatch('alergieEditHide');
    }

    public function editConditionModal($alergiesId){
        $this->conditionInfo = Conditions::find($alergiesId);
        $this->editAbleConditionInfoData = [
            'name'=>$this->conditionInfo->name,
            'notes'=>$this->conditionInfo->notes,
            'created_at'=>$this->conditionInfo->created_at->format('Y-m-d'),
        ];
        $this->dispatch('conditionEditShow');
    }
    public function editCondition(){
        $validateData = Validator::make($this->editAbleConditionInfoData, [
            'name'=> 'required',
            'notes'=> 'required',
            'created_at'=> 'required',
        ])->validate();

        $this->conditionInfo->name = $validateData['name'];
        $this->conditionInfo->notes = $validateData['notes'];
        $this->conditionInfo->created_at = $validateData['created_at'];
        $this->conditionInfo->save();
        $this->clear();
        $this->dispatch('conditionEditHide');
    }

    public function editMedicationModal($medicationId){
        $this->medicationInfo = Medication::find($medicationId);
        $this->editAbleMedicationInfoData = [
            'name'=>$this->medicationInfo->name,
            'notes'=>$this->medicationInfo->notes,
            'created_at'=>$this->medicationInfo->created_at->format('Y-m-d'),
            'end_date'=>$this->medicationInfo->end_date,
        ];
        $this->dispatch('medicationEditShow');
    }
    public function editMedication(){
        $validateData = Validator::make($this->editAbleConditionInfoData, [
            'name'=> 'required',
            'notes'=> 'required',
            'created_at'=> 'required',
            'end_date'=> 'nullable',
        ])->validate();

        $this->medicationInfo->name = $validateData['name'];
        $this->medicationInfo->notes = $validateData['notes'];
        $this->medicationInfo->created_at = $validateData['created_at'];
        $this->medicationInfo->end_date = $validateData['end_date'];
        $this->medicationInfo->save();
        $this->clear();
        $this->dispatch('medicationEditHide');
    }

    #Edit Section End


    #Create Section Start
    public function newPatientModal(){
        $this->newPatientData = [
            'id_card'=>null,
            'gender'=>null,
            'name'=>null,
            'surname'=>null,
            'date_of_birth'=>null,
            'address'=>null,
            'postcode'=>null,
            'contact_number_1'=>null,
            'contact_number_2'=>null,

            'kin1_id_card'=>null,
            'kin1_name'=>null,
            'kin1_surname'=>null,
            'kin1contact_number_1'=>null,
            'kin1contact_number_2'=>null,
            'kin2_id_card'=>null,
            'kin2_name'=>null,
            'kin2_surname'=>null,
            'kin2contact_number_1'=>null,
            'kin2contact_number_2'=>null,

            'alergie_name'=>null,
            'alergie_note'=>null,
            'condition_name'=>null,
            'condition_note'=>null,
            'medication_name'=>null,
            'medication_note'=>null,
            'medication_start_date'=>null,
            'medication_end_date'=>null,

        ];
        $this->dispatch('patientNewShow');
    }
    public function newPatient(){
        $validateData = Validator::make($this->newPatientData, [
            'id_card'=> 'required',
            'gender'=> 'required|numeric',
            'name'=> 'required',
            'surname'=> 'required',
            'date_of_birth'=> 'required',
            'address'=> 'required',
            'postcode'=> 'required|numeric',
            'contact_number_1'=> 'required|numeric',
            'contact_number_2'=> 'required|numeric',

            'kin1_id_card'=>'required',
            'kin1_name'=>'required',
            'kin1_surname'=>'required',
            'kin1contact_number_1'=>'required',
            'kin1contact_number_2'=>'required',
            'kin2_id_card'=>'required',
            'kin2_name'=>'required',
            'kin2_surname'=>'required',
            'kin2contact_number_1'=>'required',
            'kin2contact_number_2'=>'required',

            'alergie_name'=>'required',
            'alergie_note'=>'nullable',
            'condition_name'=>'required',
            'condition_note'=>'nullable',
            'medication_name'=>'required',
            'medication_note'=>'nullable',
            'medication_start_date'=>'required',
            'medication_end_date'=>'nullable',

        ])->validate();
        
        $newPatient = new Patient;
        $newPatient->id_card = $validateData['id_card'];
        $newPatient->gender = $validateData['gender'];
        $newPatient->name = $validateData['name'];
        $newPatient->surname = $validateData['surname'];
        $newPatient->date_of_birth = $validateData['date_of_birth'];
        $newPatient->address = $validateData['address'];
        $newPatient->postcode = $validateData['postcode'];
        $newPatient->contact_number_1 = $validateData['contact_number_1'];
        $newPatient->contact_number_2 = $validateData['contact_number_2'];
        $newPatient->save();

        $newKin = new Kin;#Next Of Kin 1
        $newKin->patient_id = $newPatient->id;
        $newKin->id_card = $validateData['kin1_id_card'];
        $newKin->name = $validateData['kin1_name'];
        $newKin->surname = $validateData['kin1_surname'];
        $newKin->contact_number_1 = $validateData['kin1contact_number_1'];
        $newKin->contact_number_2 = $validateData['kin1contact_number_2'];
        $newKin->save();
        $newKin = new Kin;#Next Of Kin 2
        $newKin->patient_id = $newPatient->id;
        $newKin->id_card = $validateData['kin2_id_card'];
        $newKin->name = $validateData['kin2_name'];
        $newKin->surname = $validateData['kin2_surname'];
        $newKin->contact_number_1 = $validateData['kin2contact_number_1'];
        $newKin->contact_number_2 = $validateData['kin2contact_number_2'];
        $newKin->save();

        $newAlergies = new Alergies;
        $newAlergies->patient_id = $newPatient->id;
        $newAlergies->name = $validateData['alergie_name'];
        $newAlergies->notes = $validateData['alergie_note'];
        $newAlergies->save();
        $newCondition = new Conditions;
        $newCondition->patient_id = $newPatient->id;
        $newCondition->name = $validateData['condition_name'];
        $newCondition->notes = $validateData['condition_note'];
        $newCondition->save();
        $newMedication = new Medication;
        $newMedication->patient_id = $newPatient->id;
        $newMedication->name = $validateData['medication_name'];
        $newMedication->notes = $validateData['medication_note'];
        $newMedication->start_date = $validateData['medication_start_date'];
        $newMedication->end_date = $validateData['medication_end_date'];
        $newMedication->save();

        $this->clear();
        $this->dispatch('patientNewHide');
    }

    public function newNextOfKinModal($relatedPatientID){
        $this->newPatientData = [
            'patient_id'=>$relatedPatientID,
            'id_card'=>null,
            'name'=>null,
            'surname'=>null,
            'contact_number_1'=>null,
            'contact_number_2'=>null,
        ];
        $this->dispatch('patientKinNewShow');
    }
    public function newNextOfKin(){
        $validateData = Validator::make($this->newPatientData, [
            'patient_id'=> 'required|numeric',
            'id_card'=> 'required',
            'name'=> 'required',
            'surname'=> 'required',
            'contact_number_1'=> 'required|numeric',
            'contact_number_2'=> 'required|numeric',
        ])->validate();
        $newKin = new Kin;
        $newKin->patient_id = $validateData['patient_id'];
        $newKin->id_card = $validateData['id_card'];
        $newKin->name = $validateData['name'];
        $newKin->surname = $validateData['surname'];
        $newKin->contact_number_1 = $validateData['contact_number_1'];
        $newKin->contact_number_2 = $validateData['contact_number_2'];
        $newKin->save();
        $this->clear();
        $this->dispatch('patientKinNewHide');
    }

    public function newAlergieModal($relatedPatientID){
        $this->newAlergieData = [
            'patient_id'=>$relatedPatientID,
            'name'=>null,
            'notes'=>null,
        ];
        $this->dispatch('addAlergieShow');
    }
    public function newAlergie(){
        $validateData = Validator::make($this->newAlergieData, [
            'patient_id'=> 'required|numeric',
            'name'=> 'required',
            'notes'=> 'nullable',
        ])->validate();
        $newAlergies = new Alergies;
        $newAlergies->patient_id = $validateData['patient_id'];
        $newAlergies->name = $validateData['name'];
        $newAlergies->notes = $validateData['notes'];
        $newAlergies->save();
        $this->clear();
        $this->dispatch('addAlergieHide');
    }

    public function newConditionModal($relatedPatientID){
        $this->newConditionData = [
            'patient_id'=>$relatedPatientID,
            'name'=>null,
            'notes'=>null,
        ];
        $this->dispatch('addConditionShow');
    }
    public function newCondition(){
        $validateData = Validator::make($this->newConditionData, [
            'patient_id'=> 'required|numeric',
            'name'=> 'required',
            'notes'=> 'nullable',
        ])->validate();
        $newCondition = new Conditions;
        $newCondition->patient_id = $validateData['patient_id'];
        $newCondition->name = $validateData['name'];
        $newCondition->notes = $validateData['notes'];
        $newCondition->save();
        $this->clear();
        $this->dispatch('addConditionHide');
    }

    public function newMedicationModal($relatedPatientID){
        $this->newMedicationData = [
            'patient_id'=>$relatedPatientID,
            'name'=>null,
            'notes'=>null,
            'start_date'=>null,
            'end_date'=>null,
        ];
        $this->dispatch('addMedicationShow');
    }
    public function newMedication(){
        $validateData = Validator::make($this->newMedicationData, [
            'patient_id'=> 'required|numeric',
            'name'=> 'required',
            'notes'=> 'nullable',
            'start_date'=> 'nullable',
            'end_date'=> 'nullable',
        ])->validate();
        $newMedication = new Medication;
        $newMedication->patient_id = $validateData['patient_id'];
        $newMedication->name = $validateData['name'];
        $newMedication->notes = $validateData['notes'];
        $newMedication->start_date = $validateData['start_date'];
        $newMedication->end_date = $validateData['end_date'];
        $newMedication->save();
        $this->clear();
        $this->dispatch('addMedicationHide');
    }
    #Create Section End


    private function clear(){
        $this->newPatientData = [];
        $this->newAlergieData = [];
        $this->newConditionData = [];
        $this->newMedicationData = [];
        $this->editAblePatientData = [];
        $this->editAblePatientKinData = [];
        $this->editAbleAlergieInfoData = [];
        $this->editAbleConditionInfoData = [];
        $this->editAbleMedicationInfoData = [];
    }
}
