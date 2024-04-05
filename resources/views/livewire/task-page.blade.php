<div>
    <section role="main" class="body container" style="margin-top: 100px">
        <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <div class="card-body">
                        <div class="col-md-12 text-start">
                            <button class="mb-1 mt-1 me-1 btn btn-default" wire:click="newPatientModal">Add New Patient <i class="fas fa-plus-circle"></i></a>
                        </div>
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th style="width: 50px">ID</th>
                                    <th>Record</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td style="width: 50px">{{ $patient->id }}</td>
                                        <td>
                                            <h4 class="font-weight-bold text-dark">{{ $patient->name.' '.$patient->surname.' ('.round(Carbon\Carbon::parse($patient->date_of_birth)->diffInYears(Carbon\Carbon::now())).') ' }}{!! $patient->gender ? '<i class="fas fa-venus" style="color: pink"></i>':'<i class="fas fa-mars" style="color: #58b0e0"></i>' !!}</h4>
                                            <div class="toggle toggle-primary" data-plugin-toggle>
                                                <section class="toggle">
                                                    <label>Patience Info & Contacts</label>
                                                    <div class="toggle-content">
                                                        <div class="row">
                                                            <div class="col-md-4 my-2">
                                                                <ul>
                                                                    <li>Id Card : {{ $patient->id_card }}</li>
                                                                    <li>Address : {{ $patient->address }}</li>
                                                                    <li>Date Of Birth : {{ $patient->date_of_birth }}</li>
                                                                    <li>Postcode : {{ $patient->postcode }}</li>
                                                                    <li>Contact Number 1 : {{ $patient->contact_number_1 }}</li>
                                                                    <li>Contact Number 2 : {{ $patient->contact_number_2 }}</li>
                                                                </ul>
                                                            </div>
                                                                @foreach ($patient->patientKins as $nextOfKin)
                                                                    <div class="col-md-4 my-2">
                                                                        <section class="card card-dark">
                                                                            <header class="card-header">
                                                                                <h2 class="card-title">{{ $nextOfKin->name.' '.$nextOfKin->surname }}</h2>
                                                                            </header>
                                                                            <div class="card-body">
                                                                                <ul>
                                                                                    <ul>
                                                                                        <li>Contact Number 1 : {{ $nextOfKin->contact_number_1 }}</li>
                                                                                        <li>Contact Number 2 : {{ $nextOfKin->contact_number_2 }}</li>
                                                                                    </ul>
                                                                                    <div class="col-md-12 text-end">
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="editPatientKinModal({{ $nextOfKin->id }})"><i class="fas fa-pencil-alt"></i></a>
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="deleteModal({{ $patient->id.",'Kin'" }})"><i class="far fa-trash-alt"></i></a>
                                                                                    </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                @endforeach
                                                                <div class="col-md-12 text-end">
                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="newNextOfKinModal({{ $patient->id }})"><i class="fas fa-plus-circle"></i></a>
                                                                </div>

                                                            </div>
                                                    </div>
                                                </section>
                                                <section class="toggle">
                                                    <label>Medical</label>
                                                    <div class="toggle-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <h2 class="card-title m-3">Alergie Reecords <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="newAlergieModal({{ $patient->id }})"><i class="fas fa-plus-circle"></i></a></h2>
                                                                @foreach ($patient->patientAlergies as $patientAlergie)
                                                                    <div class="col-md-4">
                                                                        <section class="card card-dark shadow">
                                                                            <div class="card-body">
                                                                                <ul>
                                                                                    <ul>
                                                                                        <li>Name : {{ $patientAlergie->name }}</li>
                                                                                        <li>Note : {{ $patientAlergie->notes }}</li>
                                                                                        <li>Create Date : {{ Carbon\Carbon::parse($patientAlergie->created_at) }}</li>
                                                                                    </ul>
                                                                            </div>
                                                                            <footer class="card-footer">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 text-end">
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="editAlergieModal({{ $patientAlergie->id }})"><i class="fas fa-pencil-alt"></i></a>
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="deleteModal({{ $patient->id.",'Alergies'" }})"><i class="far fa-trash-alt"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </footer>
                                                                        </section>
                                                                    </div>
                                                                @endforeach
                                                                <hr class="mt-2">
                                                                <h2 class="card-title m-3">Condition Reecords <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="newConditionModal({{ $patient->id }})"><i class="fas fa-plus-circle"></i></a></h2>
                                                                @foreach ($patient->patientConditions as $patientCondition)
                                                                    <div class="col-md-4">
                                                                        <section class="card card-dark shadow">
                                                                            <div class="card-body">
                                                                                <ul>
                                                                                    <ul>
                                                                                        <li>Name : {{ $patientCondition->name }}</li>
                                                                                        <li>Note : {{ $patientCondition->notes }}</li>
                                                                                        <li>Create Date : {{ Carbon\Carbon::parse($patientCondition->created_at) }}</li>
                                                                                    </ul>
                                                                            </div>
                                                                            <footer class="card-footer">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 text-end">
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="editConditionModal({{ $patientCondition->id }})"><i class="fas fa-pencil-alt"></i></a>
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="deleteModal({{ $patient->id.",'Conditions'" }})"><i class="far fa-trash-alt"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </footer>
                                                                        </section>
                                                                    </div>
                                                                @endforeach
                                                                <hr class="mt-2">
                                                                <h2 class="card-title m-3">Medication Reecords <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="newMedicationModal({{ $patient->id }})"><i class="fas fa-plus-circle"></i></a></h2>
                                                                @foreach ($patient->patientMedications as $patientMedication)
                                                                    <div class="col-md-4">
                                                                        <section class="card card-dark shadow">
                                                                            <div class="card-body">
                                                                                <ul>
                                                                                    <ul>
                                                                                        <li>Name : {{ $patientMedication->name }}</li>
                                                                                        <li>Notes : {{ $patientMedication->notes }}</li>
                                                                                        <li>Start Date : {{ $patientMedication->start_date }}</li>
                                                                                        <li>End Date : {{ $patientMedication->end_date }}</li>
                                                                                    </ul>
                                                                            </div>
                                                                            <footer class="card-footer">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 text-end">
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="editMedicationModal({{ $patientMedication->id }})"><i class="fas fa-pencil-alt"></i></a>
                                                                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" wire:click="deleteModal({{ $patient->id.",'Medication'" }})"><i class="far fa-trash-alt"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </footer>
                                                                        </section>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                
                                        </td>
                                        <td class="actions" style="width: 150px">
                                            <button class="mb-1 mt-1 me-1 btn btn-default" wire:click="editPatientModal({{ $patient->id }})"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="mb-1 mt-1 me-1 btn btn-default" wire:click="deleteModal({{ $patient->id.",'Patient'" }})"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>

    {{-- edit modals --}}
    <div class="modal fade" id="alergieEdit" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Edit Patient's Alergie</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="editAlergie">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="editAbleAlergieInfoData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="notes">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" wire:model.defer="editAbleAlergieInfoData.notes">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="created_at">Date Of Birth</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('created_at') is-invalid @enderror" wire:model.defer="editAbleAlergieInfoData.created_at">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="conditionEdit" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Edit Patient's Condition</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="editCondition">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="editAbleConditionInfoData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="notes">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" wire:model.defer="editAbleConditionInfoData.notes">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="created_at">Date Of Start</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('created_at') is-invalid @enderror" wire:model.defer="editAbleConditionInfoData.created_at">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="medicationEdit" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Edit Patient's Medication</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="editMedication">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="editAbleMedicationInfoData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="notes">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" wire:model.defer="editAbleMedicationInfoData.notes">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="created_at">Date Of Start</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('created_at') is-invalid @enderror" wire:model.defer="editAbleMedicationInfoData.created_at">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="end_date">Date Of End</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" wire:model.defer="editAbleMedicationInfoData.end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="patientEdit" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Edit Patient Info</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="editPatient">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('id_card') is-invalid @enderror" wire:model.defer="editAblePatientData.id_card">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="editAblePatientData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('surname') is-invalid @enderror" wire:model.defer="editAblePatientData.surname">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="gender">Gender</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm mb-3 @error('gender') is-invalid @enderror" wire:model.defer="editAblePatientData.gender">
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="date_of_birth">Date Of Birth</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" wire:model.defer="editAblePatientData.date_of_birth">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="postcode">Postcode</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('postcode') is-invalid @enderror" wire:model.defer="editAblePatientData.postcode">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="adress">Adress</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model.defer="editAblePatientData.address">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber1">Contact Number 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_1') is-invalid @enderror" wire:model.defer="editAblePatientData.contact_number_1" minlength="5">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber2">Contact Number 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_2') is-invalid @enderror" wire:model.defer="editAblePatientData.contact_number_2" minlength="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="patientKinEdit" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Edit Patient's next of kin</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="editPatientKin">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('id_card') is-invalid @enderror" wire:model.defer="editAblePatientKinData.id_card">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="editAblePatientKinData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('surname') is-invalid @enderror" wire:model.defer="editAblePatientKinData.surname">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber1">Contact Number 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_1') is-invalid @enderror" wire:model.defer="editAblePatientKinData.contact_number_1" minlength="5">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber2">Contact Number 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_2') is-invalid @enderror" wire:model.defer="editAblePatientKinData.contact_number_2" minlength="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- create modals --}}
    <div id="createModalAlergie" class="modal-block modal-block-lg mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Add Alergie</h2>
            </header>
            <div class="card-body">
                <div class="card-body card-body-nopadding">
                    <form class="form-horizontal" novalidate="novalidate">
                        <div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="IdCard" id="IdCard" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="surname" id="surname" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="address">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address" id="address" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="postcode">Postcode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="postcode" id="postcode" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="ContactNumber1">Contact Number 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ContactNumber1" id="ContactNumber1" minlength="5">
                                </div>
                            </div>
                            <div class="form-group row pb-2">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="ContactNumber2">Contact Number 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ContactNumber2" id="ContactNumber2" minlength="5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-success">Create</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </div>
    <div id="createModalCondition" class="modal-block modal-block-lg mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Add Alergie</h2>
            </header>
            <div class="card-body">
                <div class="card-body card-body-nopadding">
                    <form class="form-horizontal" novalidate="novalidate">
                        <div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="IdCard" id="IdCard" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="surname" id="surname" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="address">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address" id="address" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="postcode">Postcode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="postcode" id="postcode" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="ContactNumber1">Contact Number 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ContactNumber1" id="ContactNumber1" minlength="5">
                                </div>
                            </div>
                            <div class="form-group row pb-2">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="ContactNumber2">Contact Number 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ContactNumber2" id="ContactNumber2" minlength="5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-success">Create</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </div>
    <div id="createModalMedication" class="modal-block modal-block-lg mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Add Alergie</h2>
            </header>
            <div class="card-body">
                <div class="card-body card-body-nopadding">
                    <form class="form-horizontal" novalidate="novalidate">
                        <div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="IdCard" id="IdCard" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="surname" id="surname" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="address">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address" id="address" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="postcode">Postcode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="postcode" id="postcode" >
                                </div>
                            </div>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="ContactNumber1">Contact Number 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ContactNumber1" id="ContactNumber1" minlength="5">
                                </div>
                            </div>
                            <div class="form-group row pb-2">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="ContactNumber2">Contact Number 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ContactNumber2" id="ContactNumber2" minlength="5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-success">Create</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </div>

    {{-- delete modals --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">{{ $deleteData?->name.' '.$deleteData?->surname.' ('.$deleteData?->id.') will be deleted.'  }}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <button wire:click="delete" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>


    {{-- create modals --}}
    <div class="modal fade" id="patientNew" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">New Patient Info</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tabs">
                        <ul class="nav nav-tabs nav-justify wizard-steps wizard-steps-style-2">
                            <li class="nav-item active">
                                <a href="#w2-patient" data-bs-toggle="tab" class="nav-link text-center">
                                    <span class="badge badge-primary">1</span> Patient
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#w2-kins" data-bs-toggle="tab" class="nav-link text-center">
                                    <span class="badge badge-primary">2</span> Next Of Kins
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#w2-medical" data-bs-toggle="tab" class="nav-link text-center">
                                    <span class="badge badge-primary">3</span> Medical
                                </a>
                            </li>
                        </ul>
                        <form class="form-horizontal" novalidate="novalidate" wire:submit.prevent="newPatient">
                            <div class="tab-content">
                                <div id="w2-patient" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('id_card') is-invalid @enderror" placeholder="ID Card" id="IdCard" maxlength="255" wire:model.defer="newPatientData.id_card">
                                        </div>
                                        @error('id_card')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" wire:model.defer="newPatientData.name">
                                        </div>
                                        @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('surname') is-invalid @enderror" placeholder="Surname" id="surname" wire:model.defer="newPatientData.surname">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="gender">Gender</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm mb-3 @error('id_card') is-invalid @enderror" id="gender" wire:model.defer="newPatientData.gender">
                                                <option selected>Select</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="date_of_birth">Date Of Birth</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" wire:model.defer="newPatientData.date_of_birth">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="postcode">Postcode</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('postcode') is-invalid @enderror" placeholder="Postcode" maxlength="11" wire:model.defer="newPatientData.postcode">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="adress">Adress</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" wire:model.defer="newPatientData.address">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber1">Contact Number 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_1') is-invalid @enderror" placeholder="Contact Number 1" wire:model.defer="newPatientData.contact_number_1" minlength="5" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber2">Contact Number 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_2') is-invalid @enderror" placeholder="Contact Number 2" wire:model.defer="newPatientData.contact_number_2" minlength="5" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div id="w2-kins" class="tab-pane p-3 active">
                                    <h2>Next Of Kin 1</h2>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin1_id_card">ID Card</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('id_card') is-invalid @enderror" placeholder="ID Card" id="kin1_id_card" wire:model.defer="newPatientData.kin1_id_card" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin1_name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin1_name') is-invalid @enderror" placeholder="Name" id="kin1_name" wire:model.defer="newPatientData.kin1_name" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin1_surname">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin1_surname') is-invalid @enderror" placeholder="Surname" id="kin1_surname" wire:model.defer="newPatientData.kin1_surname" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1">Contact Number 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin1contact_number_1') is-invalid @enderror" placeholder="Contact Number 1" wire:model.defer="newPatientData.kin1contact_number_1" minlength="5" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-4 control-label text-sm-end pt-1">Contact Number 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin1contact_number_2') is-invalid @enderror" placeholder="Contact Number 2" wire:model.defer="newPatientData.kin1contact_number_2" minlength="5" maxlength="20">
                                        </div>
                                    </div>
                                    <hr>
                                    <h2>Next Of Kin 2</h2>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin2_id_card">ID Card</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin2_id_card') is-invalid @enderror" placeholder="ID Card" id="kin2_id_card" wire:model.defer="newPatientData.kin2_id_card" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin2_name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin2_name') is-invalid @enderror" placeholder="Name" id="kin2_name" wire:model.defer="newPatientData.kin2_name" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin2_surname">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin2_surname') is-invalid @enderror" placeholder="Surname" id="kin2_surname" wire:model.defer="newPatientData.kin2_surname" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin2contact_number_1">Contact Number 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin2contact_number_1') is-invalid @enderror" placeholder="Contact Number 1" wire:model.defer="newPatientData.kin2contact_number_1" minlength="5" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="kin2contact_number_2">Contact Number 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('kin2contact_number_2') is-invalid @enderror" placeholder="Contact Number 2" wire:model.defer="newPatientData.kin2contact_number_2" minlength="5" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div id="w2-medical" class="tab-pane p-3">
                                    <h2>Alergie</h2>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="alergie_name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('alergie_name') is-invalid @enderror" placeholder="Name" wire:model.defer="newPatientData.alergie_name" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="alergie_note">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('alergie_note') is-invalid @enderror" placeholder="Note" wire:model.defer="newPatientData.alergie_note">
                                        </div>
                                    </div>
                                    <hr>
                                    <h2>Conditions</h2>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="condition_name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('condition_name') is-invalid @enderror" placeholder="Name" wire:model.defer="newPatientData.condition_name" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="condition_note">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('condition_note') is-invalid @enderror" placeholder="Note" wire:model.defer="newPatientData.condition_note">
                                        </div>
                                    </div>
                                    <hr>
                                    <h2>Medication</h2>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="medication_name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('medication_name') is-invalid @enderror" id="medication_name" placeholder="Name" wire:model.defer="newPatientData.medication_name" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="medication_note">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('medication_note') is-invalid @enderror" id="medication_note" placeholder="Note" wire:model.defer="newPatientData.medication_note">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="medication_start_date">Date Of Start</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('medication_start_date') is-invalid @enderror" id="medication_start_date" wire:model.defer="newPatientData.medication_start_date">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="medication_end_date">Date Of End</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('medication_end_date') is-invalid @enderror" id="medication_end_date" wire:model.defer="newPatientData.medication_end_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="patientKinNew" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">New Patient Info</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="newNextOfKin">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="IdCard">ID Card</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('id_card') is-invalid @enderror" placeholder="ID Card" id="IdCard" wire:model.defer="newPatientData.id_card">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" wire:model.defer="newPatientData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="surname">Surname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('surname') is-invalid @enderror" placeholder="Surname" id="surname" wire:model.defer="newPatientData.surname">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber1">Contact Number 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_1') is-invalid @enderror" placeholder="Contact Number 1" wire:model.defer="newPatientData.contact_number_1" minlength="5">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-2">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="contactNumber2">Contact Number 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('contact_number_2') is-invalid @enderror" placeholder="Contact Number 2" wire:model.defer="newPatientData.contact_number_2" minlength="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addAlergie" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">New Alergie</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="newAlergie">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" wire:model.defer="newAlergieData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="notes">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" placeholder="Note" wire:model.defer="newAlergieData.notes">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCondition" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">New Condition</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="newCondition">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" wire:model.defer="newConditionData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="notes">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" placeholder="Note" wire:model.defer="newConditionData.notes">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addMedication" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">New Alergie</h2>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-body-nopadding">
                        <form class="form-horizontal" wire:submit.prevent="newMedication">
                            @csrf
                            <div class="tab-content">
                                <div id="w1-account" class="tab-pane p-3 active">
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" wire:model.defer="newMedicationData.name">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="notes">Notes</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" placeholder="Note" wire:model.defer="newMedicationData.notes">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="start_date">Date Of Start</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" wire:model.defer="newMedicationData.start_date">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-3">
                                        <label class="col-sm-4 control-label text-sm-end pt-1" for="end_date">Date Of End</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" wire:model.defer="newMedicationData.end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Bootstrap's modal trigger js is working before livewire js
        // This is causing that modals appears with old data
        // So I hande it manually
        window.addEventListener('patientEditShow', event => {
            $('#patientEdit').modal('show');
        });
        window.addEventListener('patientEditHide', event => {
            $('#patientEdit').modal('hide');
        });

        window.addEventListener('patientKinEditShow', event => {
            $('#patientKinEdit').modal('show');
        });
        window.addEventListener('patientKinEditHide', event => {
            $('#patientKinEdit').modal('hide');
        });
        
        window.addEventListener('alergieEditShow', event => {
            $('#alergieEdit').modal('show');
        });
        window.addEventListener('alergieEditHide', event => {
            $('#alergieEdit').modal('hide');
        });
        
        window.addEventListener('conditionEditShow', event => {
            $('#conditionEdit').modal('show');
        });
        window.addEventListener('conditionEditHide', event => {
            $('#conditionEdit').modal('hide');
        });
        
        window.addEventListener('medicationEditShow', event => {
            $('#medicationEdit').modal('show');
        });
        window.addEventListener('medicationEditHide', event => {
            $('#medicationEdit').modal('hide');
        });
        
        window.addEventListener('deleteModalShow', event => {
            $('#deleteModal').modal('show');
        });
        window.addEventListener('deleteModalHide', event => {
            $('#deleteModal').modal('hide');
        });
        
        window.addEventListener('patientNewShow', event => {
            $('#patientNew').modal('show');
        });
        window.addEventListener('patientNewHide', event => {
            $('#patientNew').modal('hide');
        });
        
        window.addEventListener('patientKinNewShow', event => {
            $('#patientKinNew').modal('show');
        });
        window.addEventListener('patientKinNewHide', event => {
            $('#patientKinNew').modal('hide');
        });
        
        window.addEventListener('addAlergieShow', event => {
            $('#addAlergie').modal('show');
        });
        window.addEventListener('addAlergieHide', event => {
            $('#addAlergie').modal('hide');
        });
        
        window.addEventListener('addConditionShow', event => {
            $('#addCondition').modal('show');
        });
        window.addEventListener('addConditionHide', event => {
            $('#addCondition').modal('hide');
        });
        
        window.addEventListener('addMedicationShow', event => {
            $('#addMedication').modal('show');
        });
        window.addEventListener('addMedicationHide', event => {
            $('#addMedication').modal('hide');
        });

    </script>
    
</div>
