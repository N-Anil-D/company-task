<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Extratik - Task - NAD</title>
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('designFiles/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('designFiles/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('designFiles/font-awesome/css/all.min.css') }}" />
		{{-- <link rel="stylesheet" href="{{ asset('designFiles/boxicons/css/boxicons.min.css') }}" /> --}}
		<link rel="stylesheet" href="{{ asset('designFiles/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('designFiles/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
        <link rel="stylesheet" href="{{ asset('designFiles/select2/css/select2.css') }}" />
		<link rel="stylesheet" href="{{ asset('designFiles/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('designFiles/datatables/media/css/dataTables.bootstrap5.css') }}" />


		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('designFiles/css/theme.css') }}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('designFiles/css/skins/default.css') }}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('designFiles/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('designFiles/modernizr/modernizr.js') }}"></script>

	</head>
	<body>
		<section class="body">
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
                                                <th style="max-width: 50px">Action</th>
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
                                                                            <h2 class="card-title m-3">Alergie Reecords</h2>
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
                                                                                    </section>
                                                                                </div>
                                                                            @endforeach
                                                                            <hr class="mt-2">
                                                                            <h2 class="card-title m-3">Condition Reecords</h2>
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
                                                                                    </section>
                                                                                </div>
                                                                            @endforeach
                                                                            <hr class="mt-2">
                                                                            <h2 class="card-title m-3">Medication Reecords</h2>
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
                                                                                    </section>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                            
                                                    </td>
                                                    <td style="max-width: 20px">id</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
				</section>

		</section>

		<!-- Vendor -->
		<script src="{{ asset('designFiles/jquery/jquery.js') }}"></script>
		<script src="{{ asset('designFiles/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('designFiles/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('designFiles/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('designFiles/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('designFiles/common/common.js') }}"></script>
		<script src="{{ asset('designFiles/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('designFiles/magnific-popup/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('designFiles/jquery-placeholder/jquery.placeholder.js') }}"></script>

		<!-- Specific Page Vendor -->
		<script src="{{ asset('designFiles/select2/js/select2.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/media/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/media/js/dataTables.bootstrap5.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js') }}"></script>
		<script src="{{ asset('designFiles/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('designFiles/js/theme.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('designFiles/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('designFiles/js/theme.init.js') }}"></script>

        <!-- Examples -->
		<script src="{{ asset('designFiles/js/examples/examples.datatables.default.js') }}"></script>
		<script src="{{ asset('designFiles/js/examples/examples.datatables.row.with.details.js') }}"></script>
		<script src="{{ asset('designFiles/js/examples/examples.datatables.tabletools.js') }}"></script>


	</body>
</html>