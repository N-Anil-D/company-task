<section role="main" class="body container" style="margin-top: 100px">
    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th style="max-width: 20px">ID</th>
                                <th>Record</th>
                                <th style="max-width: 20px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td style="max-width: 20px">{{ $patient->id }}</td>
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
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                </div>
                                            </section>
                                            <section class="toggle">
                                                <label>Medical</label>
                                                <div class="toggle-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <h2 class="card-title m-3">Alergie Reecords <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#createModalAlergie"><i class="fas fa-plus-circle"></i></a></h2>
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
                                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#editModalAlergie"><i class="fas fa-pencil-alt"></i></a>
                                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#deleteModalAlergie"><i class="far fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </footer>
                                                                    </section>
                                                                </div>
                                                            @endforeach
                                                            <hr class="mt-2">
                                                            <h2 class="card-title m-3">Condition Reecords <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#createModalCondition"><i class="fas fa-plus-circle"></i></a></h2>
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
                                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#editModalCondition"><i class="fas fa-pencil-alt"></i></a>
                                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#deleteModalCondition"><i class="far fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </footer>
                                                                    </section>
                                                                </div>
                                                            @endforeach
                                                            <hr class="mt-2">
                                                            <h2 class="card-title m-3">Medication Reecords <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#createModalMedication"><i class="fas fa-plus-circle"></i></a></h2>
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
                                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#editModalMedication"><i class="fas fa-pencil-alt"></i></a>
                                                                                    <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#deleteModalMedication"><i class="far fa-trash-alt"></i></a>
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
                                    <td class="actions">
                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default editPatient" href="#modalBasic" value="{{ $patient->id }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#deleteModalPatient" value="{{ $patient->id }}"><i class="far fa-trash-alt"></i></button>
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
<div id="modalBasic" class="modal-block modal-block-lg mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Edit Patient Info</h2>
        </header>
        <div class="card-body">
            <div class="card-body card-body-nopadding">
                <div class="wizard-tabs">
                    <ul class="nav wizard-steps">
                        <li class="nav-item active">
                            <a data-bs-target="#w1-account" data-bs-toggle="tab" class="nav-link text-center">
                                <span class="badge">1</span> Patient Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-target="#w1-profile" data-bs-toggle="tab" class="nav-link text-center">
                                <span class="badge">2</span> Next of Kin
                            </a>
                        </li>
                    </ul>
                </div>
                <form class="form-horizontal" novalidate="novalidate">
                    <div class="tab-content">
                        <div id="w1-account" class="tab-pane p-3 active">
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
                        <div id="w1-profile" class="tab-pane p-3">
                            <h4>Next Of Kin 1</h4>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin1IdCard">IdCard</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin1IdCard" id="NextOfKin1IdCard" placeholder="IdCard">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin1Name">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin1Name" id="NextOfKin1Name" placeholder="Name">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin1Surname">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin1Surname" id="NextOfKin1Surname" placeholder="Surname">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin1ContactNumber1">Contact Number 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin1ContactNumber1" id="NextOfKin1ContactNumber1" placeholder="IdCard">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin1ContactNumber2">Contact Number 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin1ContactNumber2" id="NextOfKin1ContactNumber2" placeholder="IdCard">
                                </div>
                            </div>
                            <h4>Next Of Kin 2</h4>
                            <div class="form-group row pb-3">
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin2IdCard">IdCard</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin2IdCard" id="NextOfKin2IdCard" placeholder="IdCard">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin2Name">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin2Name" id="NextOfKin2Name" placeholder="Name">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin2Surname">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin2Surname" id="NextOfKin2Surname" placeholder="Surname">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin2ContactNumber1">Contact Number 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin2ContactNumber1" id="NextOfKin2ContactNumber1" placeholder="Contact Number 1">
                                </div>
                                <label class="col-sm-4 control-label text-sm-end pt-1" for="NextOfKin2ContactNumber2">Contact Number 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NextOfKin2ContactNumber2" id="NextOfKin2ContactNumber2" placeholder="Contact Number 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</div>
<div id="editModalAlergie" class="modal-block modal-block-lg mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Edit Alergie Info</h2>
        </header>
        <div class="card-body">
                <form class="form-horizontal" novalidate="novalidate">
                    <div>
                        <div class="form-group row pb-3">
                            <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Note</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" id="textareaDefault"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</div>
<div id="editModalCondition" class="modal-block modal-block-lg mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Edit Condition Info</h2>
        </header>
        <div class="card-body">
                <form class="form-horizontal" novalidate="novalidate">
                    <div>
                        <div class="form-group row pb-3">
                            <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Note</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" id="textareaDefault"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</div>
<div id="editModalMedication" class="modal-block modal-block-lg mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Edit Medication Info</h2>
        </header>
        <div class="card-body">
                <form class="form-horizontal" novalidate="novalidate">
                    <div>
                        <div class="form-group row pb-3">
                            <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-sm-4 control-label text-sm-end pt-1" for="name">Note</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" id="textareaDefault"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </div>
    </section>
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
                        <button class="btn btn-primary modal-confirm">Confirm</button>
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
                        <button class="btn btn-primary modal-confirm">Confirm</button>
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
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</div>
{{-- delete modals --}}
<div id="deleteModalPatient" class="modal-block modal-block-sm mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Are you sure?</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p class="mb-0">Are you sure that you want to delete the patient?</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary modal-confirm">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<div id="deleteModalAlergie" class="modal-block modal-block-sm mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Are you sure?</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p class="mb-0">Are you sure that you want to delete the Alergie from patient?</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary modal-confirm">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<div id="deleteModalCondition" class="modal-block modal-block-sm mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Are you sure?</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p class="mb-0">Are you sure that you want to delete the Condition from patient?</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary modal-confirm">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<div id="deleteModalMedication" class="modal-block modal-block-sm mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Are you sure?</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p class="mb-0">Are you sure that you want to delete the Medication from patient?</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary modal-confirm">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
