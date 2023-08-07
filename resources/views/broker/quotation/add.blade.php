@extends("layouts.app")

@section("title")
    Create Quotation
@endsection

@section("stylesheet")
    <link rel="stylesheet" href="{{ asset("dist/css/stepper.css") }}">
@endsection

@section("breadcrumb")
    <li class="breadcrumb-item active">Create Quotation</li>
@endsection

@section("content")
    <div class="row justify-content-center">
        <div class="col">
            <ul class="step-wizard-list">
                <li class="step-wizard-item {{ $step === 1 ? "current-item" : "" }}">
                    <p class="progress-count">1</p>
                    <p class="progress-label">Customer Details</p>
                </li>
                <li class="step-wizard-item {{ $step === 2 ? "current-item" : "" }}">
                    <p class="progress-count">2</p>
                    <p class="progress-label">Class Of Business</p>
                </li>
                <li class="step-wizard-item {{ $step === 3 ? "current-item" : "" }}">
                    <p class="progress-count">3</p>
                    <p class="progress-label">Object Details</p>
                </li>
                <li class="step-wizard-item {{ $step === 4 ? "current-item" : "" }}">
                    <p class="progress-count">4</p>
                    <p class="progress-label">Additional Benefit</p>
                </li>
                <li class="step-wizard-item {{ $step === 5 ? "current-item" : "" }}">
                    <p class="progress-count">5</p>
                    <p class="progress-label">Preview</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header py-2">
                    <h3 class="card-title m-0 py-1">
                        @if($step === 1)
                            Customer Details
                        @elseif($step === 2)
                            Class Of Business
                        @elseif($step === 3)
                            Object Details
                        @elseif($step === 4)
                            Additional Benefit
                        @elseif($step === 5)
                            Preview
                        @endif
                    </h3>
                </div>
                <form method="POST" action="{{ route("broker.quotation." . ($step === 5 ? "store" : "next")) }}" enctype="multipart/form-data">
                    @csrf

                    <input type="number" name="step" id="step" value="{{ $step }}" class="d-none">
                    <input type="text" name="data" value="{{ json_encode($data) }}" class="d-none">
                    @if($step === 1)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customerFullName">Customer's Full Name</label>
                                <input type="text" class="form-control @error("name") is-invalid @enderror" name="name"
                                       id="customerName"
                                       placeholder="Enter customer's full name..." required
                                       value="{{ old("name") }}">
                                @error("name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Address</b></label>
                                <textarea class="form-control @error("address") is-invalid @enderror" id="address"
                                          name="address"
                                          placeholder="Enter customer's road address..." required
                                          autocomplete="on">{{ old("address") }}</textarea>
                                @error("address")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Urban Village (Kelurahan)</b></label>
                                <input type="text" id="urbanVillage"
                                       class="form-control @error("kelurahan") is-invalid @enderror w-50"
                                       name="kelurahan"
                                       placeholder="Enter customer's urban village..." required
                                       value="{{ old("kelurahan") }}">
                                @error("kelurahan")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Sub District (Kecamatan)</b></label>
                                <input type="text" id="subDistrict"
                                       class="form-control @error("kecamatan") is-invalid @enderror w-50"
                                       name="kecamatan"
                                       placeholder="Enter customer's sub district..." required
                                       value="{{ old("kecamatan") }}">
                                @error("kecamatan")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>District/Regency (Kabupaten/Kota)</b></label>
                                <input type="text" id="district"
                                       class="form-control @error("city") is-invalid @enderror w-50" name="city"
                                       placeholder="Enter customer's district/regency..." required
                                       value="{{ old("city") }}">
                                @error("city")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><b>Province</b></label>
                                <input type="text" id="province"
                                       class="form-control @error("province") is-invalid @enderror w-50" name="province"
                                       placeholder="Enter customer's province..." required
                                       value="{{ old("province") }}">
                                @error("province")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date and time range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text"
                                           class="form-control @error("reservation") is-invalid @enderror float-right"
                                           id="reservation" name="reservation" value="{{ old("reservation") }}"
                                           required>
                                    @error("reservation")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @elseif($step === 2)
                        <div class="card-body">
                            <div class="form-group">
                                <label><b>Choose the class of business:</b></label>
                                <select class="form-control @error("cob") is-invalid @enderror" name="cob" id="cob"
                                        required>
                                    <option>Choose...</option>
                                    @foreach(["Fire", "Motor Vehicle"] as $cob)
                                        <option
                                            value="{{ $cob }}" {{ $cob === old("cob") ? "selected" : "" }}>{{ $cob }}</option>
                                    @endforeach
                                </select>
                                @error("cob")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    @elseif($step === 3)
                        <div class="card-body">
                            <div class="form-group">
                                <label><b>Main Coverage</b></label>
                                <select class="form-control @error("coverage") is-invalid @enderror" name="coverage"
                                        id="coverage"
                                        required>
                                    <option>Choose...</option>
                                    @foreach(["TLO", "Comprehensive"] as $coverage)
                                        <option
                                            value="{{ $coverage }}" {{ $coverage === old("coverage", empty($data["coverage"]) ? null : $data["coverage"]) ? "selected" : "" }}>{{ $coverage }}</option>
                                    @endforeach
                                </select>
                                @error("coverage")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Brand</b></label>
                                <select
                                    class="form-control @error("brand") is-invalid @enderror"
                                    name="brand"
                                    id="brand"
                                    required
                                    onchange="document.getElementById('step').value = {{ $step - 1 }}; document.getElementById('submit').click();"
                                >
                                    <option>Choose...</option>
                                    @foreach($brands as $brand)
                                        <option
                                            value="{{ $brand->id }}" {{ $brand->id === old("brand_id", empty($data["brand"]) ? null : (int) $data["brand"]) ? "selected" : "" }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error("brand")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Model</b></label>
                                <select
                                    class="form-control @error("model") is-invalid @enderror"
                                    name="model"
                                    id="model"
                                    required
                                    onchange="document.getElementById('step').value = {{ $step - 1 }}; document.getElementById('submit').click();"
                                >
                                    <option>Choose...</option>
                                    @foreach($models as $model)
                                        <option
                                            value="{{ $model->id }}" {{ $model->id === old("model_id", empty($data["model"]) ? null : (int) $data["model"]) ? "selected" : "" }}>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                                @error("model")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Type</b></label>
                                <select
                                    class="form-control @error("type") is-invalid @enderror"
                                    name="type"
                                    id="type"
                                    required
                                    onchange="document.getElementById('step').value = {{ $step - 1 }}; document.getElementById('submit').click();"
                                >
                                    <option>Choose...</option>
                                    @foreach($types as $type)
                                        <option
                                            value="{{ $type->id }}" {{ $type->id === old("type_id", empty($data["type"]) ? null : (int) $data["type"]) ? "selected" : "" }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error("type")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><b>Passenger Seat</b></label>
                                <input type="text" class="form-control" name="seat" id="seat"
                                       placeholder="(Not including driver's seat)" value="{{ $dataType->seat }}"
                                       readonly>
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Built Year</b></label>
                                <input type="text" class="form-control" name="year" id="year"
                                       value="{{ $dataType->year }}"
                                       readonly>
                            </div>

                            <div class="form-group">
                                <label><b>License Plate</b></label>
                                <select class="form-control @error("plat") is-invalid @enderror" name="plat" id="plat" required>
                                    <option>Choose...</option>
                                    @foreach($plats as $plat)
                                        <option
                                            value="{{ $plat->id }}" {{ $plat->id === old("plat_id", empty($data["plat"]) ? null : (int) $data["plat"]) ? "selected" : "" }}>{{ $plat->plat }}</option>
                                    @endforeach
                                </select>
                                @error("plat")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Sum Insured</b></label>
                                <div class="input-group">
                                    <select class="form-control col-1" name="curr" id="curr" aria-expanded="false"
                                            required>
                                        <option selected>IDR</option>
                                    </select>
                                    <input type="number" class="form-control @error("vsi") is-invalid @enderror" name="vsi" id="vsi"
                                           placeholder="Automatic Input" value="{{ old("vsi", $dataType->price) }}">
                                </div>
                                @error("vsi")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    @elseif($step === 4)
                        <div class="card-body">
                            <div class="row ms-5 justify-content-around">
                                <div class="col">
                                    <img src="{{ asset("dist/img/flood.png") }}" style="width: 24px; height: 24px;"><b>Flood</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" name="flood">
                                            <option>No</option>
                                            <option>Yes</option>
                                        </select>
                                    </div>

                                    <br>

                                    <img src="{{ asset("dist/img/earthquake.png") }}"
                                         style="width: 24px; height: 24px;"><b> Earthquake</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" id="earthquake" name="earthquake">
                                            <option>No</option>
                                            <option>Yes</option>
                                        </select>
                                    </div>

                                    <br>

                                    <img src="{{ asset("dist/img/riot.png") }}" style="width: 24px; height: 24px;"><b>
                                        SRCC (Strike, Riot, and Civic Commotion)</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" id="srcc" name="srcc">
                                            <option>No</option>
                                            <option>Yes</option>
                                        </select>
                                    </div>

                                    <br>

                                    <img src="{{ asset("dist/img/tns.png") }}" style="width: 24px; height: 24px;"><b>
                                        T&S (Terrorism & Sabotage)</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" id="tns" name="tns">
                                            <option>No</option>
                                            <option>Yes</option>
                                        </select>
                                    </div>

                                    <br>

                                    <b>Others</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" id="others" name="others">
                                            <option>No</option>
                                            <option>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="col">
                                    <img src="{{ asset("dist/img/legal.png") }}" style="width: 24px; height: 24px;"><b>
                                        Third Party Liability</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" name="tpl" id="tpl">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>

                                    <div class="input-group mt-2" id="tpl_Input" style="display: none;">
                                        <div class="me-2">
                                            <select class="form-control" name="curr" id="curr" aria-expanded="false">
                                                <option selected>IDR</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="tpl_limit"
                                               placeholder="Enter the vehicle's TPL value" value="">
                                    </div>

                                    <br>

                                    <img src="{{ asset("dist/img/law.png") }}" style="width: 24px; height: 24px;"><b>
                                        Third Party Liability to Passenger</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" name="tpl_to_passenger" id="tplPassenger">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>

                                    <div class="input-group mt-2 Yes tplPassenger_Input" id="tplPassenger_Input"
                                         style="display: none;">
                                        <div class="me-2">
                                            <select class="form-control" name="curr" id="curr" aria-expanded="false">
                                                <option selected>IDR</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="tpl_to_passenger_limit"
                                               placeholder="Enter the TPL to Passenger value" value="">
                                    </div>

                                    <br>

                                    <img src="{{ asset("dist/img/driver.png") }}" style="width: 20px; height: 20px;"><b>
                                        Driver's Personal Accident</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" name="dpa" id="driverPA">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>

                                    <div class="input-group mt-2 Yes driverPA_Input" id="driverPA_Input"
                                         style="display: none;">
                                        <div class="me-2">
                                            <select class="form-control" name="curr" id="curr" aria-expanded="false">
                                                <option selected>IDR</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="dpa_limit"
                                               placeholder="Enter the Driver's PA value" value="">
                                    </div>

                                    <br>

                                    <img src="{{ asset("dist/img/passenger.png") }}" style="width: 22px; height: 22px;"><b>
                                        Passenger's Personal Accident</b>
                                    <div class="dropdown">
                                        <select class="form-control w-50" name="ppa" id="passengerPA">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>

                                    <div class="input-group mt-2 Yes passengerPA_Input" id="passengerPA_Input"
                                         style="display: none;">
                                        <div class="me-2">
                                            <select class="form-control" name="curr" id="curr" aria-expanded="false">
                                                <option selected>IDR</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="ppa_limit"
                                               placeholder="Enter the Passenger PA value" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($step === 5)
                        <div class="card-body">
                            <div class="">
                                <h4 class="m-0 fw-bold text-center">Preview</h4>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Customer's Full Name</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["name"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Class Of Business</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["cob"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Address</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["address"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Urban Village (Kelurahan)</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["kelurahan"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Sub District (Kecamatan)</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["kecamatan"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">District/Regency (Kabupaten/Kota)</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["city"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">District/Regency (Kabupaten/Kota)</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["city"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Province</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["province"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Start Date</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["start_date"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">End Date</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["end_date"] }}">
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="m-0 fw-bold text-center">Vehicle Details</h4>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Main Coverage</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["coverage"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Vehicle Brand</p>
                                    <input type="text" class="form-control" disabled value="{{ $dataBrand->name }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Vehicle Model</p>
                                    <input type="text" class="form-control" disabled value="{{ $dataModel->name }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Vehicle Type</p>
                                    <input type="text" class="form-control" disabled value="{{ $dataType->name }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Passenger Seat</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["seat"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Vehicle Built Year</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["year"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">License Plate</p>
                                    <input type="text" class="form-control" disabled value="{{ $dataPlat->plat }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Vehicle Sum Insured</p>
                                    <input type="text" class="form-control" disabled value="Rp {{ number_format($data["vsi"]) }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Total Premium</p>
                                    <input type="text" class="form-control" disabled value="Rp {{ number_format($data["vsi"] * $rate / 100) }}">
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="m-0 fw-bold text-center">Upload Vehicle Details</h4>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Upload PDF File</p>
                                    <input
                                    type="file"
                                    name="files[]"
                                    multiple
                                    class="form-control
                                    @error("files") is-invalid @enderror" accept="application/pdf"
                                    required>
                                    @error("files")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="m-0 fw-bold text-center">Additional Benefit</h4>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Flood</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["flood"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Earthquake</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["earthquake"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">SRCC (Strike, Riot, and Civic Commotion)</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["srcc"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">T&S (Terrorism & Sabotage)</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["tns"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Others</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["others"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Third Party Liability</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["tpl"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Third Party Liability (Value)</p>
                                    <input type="text" class="form-control" disabled value="Rp {{ number_format($data["tpl_limit"]) }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Third Party Liability to Passenger</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["tpl_to_passenger"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Third Party Liability to Passenger (Value)</p>
                                    <input type="text" class="form-control" disabled value="Rp {{ number_format($data["tpl_to_passenger_limit"]) }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Driver's Personal Accident</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["dpa"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Driver's Personal Accident (Value)</p>
                                    <input type="text" class="form-control" disabled value="Rp {{ number_format($data["dpa_limit"]) }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Passenger's Personal Accident</p>
                                    <input type="text" class="form-control" disabled value="{{ $data["ppa"] }}">
                                </div>
                                <div class="mt-3">
                                    <p class="m-0 fw-bold">Passenger's Personal Accident (Value)</p>
                                    <input type="text" class="form-control" disabled value="Rp {{ number_format($data["ppa_limit"]) }}">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-footer">
                        <div class="button-row d-flex justify-content-end">
                            <button type="submit" id="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        let today = new Date();
        let endDate = new Date();
        endDate.setFullYear(endDate.getFullYear() + 1);
        $("#reservation").daterangepicker({
            startData: today,
            endDate: endDate
        });

        let select = document.getElementById("tpl");
        select.onchange = function () {
            if (select.value === "Yes") {
                document.getElementById("tpl_Input").style.display = "";
            } else {
                document.getElementById("tpl_Input").style.display = "none";
            }
        }

        let tplPassenger = document.getElementById("tplPassenger");
        tplPassenger.onchange = function () {
            if (tplPassenger.value === "Yes") {
                document.getElementById("tplPassenger_Input").style.display = "";
            } else {
                document.getElementById("tplPassenger_Input").style.display = "none";
            }
        }

        let driverPA = document.getElementById("driverPA");
        driverPA.onchange = function () {
            if (driverPA.value === "Yes") {
                document.getElementById("driverPA_Input").style.display = "";
            } else {
                document.getElementById("driverPA_Input").style.display = "none";
            }
        }

        let passengerPA = document.getElementById("passengerPA");
        passengerPA.onchange = function () {
            if (passengerPA.value === "Yes") {
                document.getElementById("passengerPA_Input").style.display = "";
            } else {
                document.getElementById("passengerPA_Input").style.display = "none";
            }
        }
    </script>
@endsection
