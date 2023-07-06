@extends("layouts.app")

@section("title")
    Create Quotation
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
                        @endif
                    </h3>
                </div>
                <form method="POST" action="{{ route("broker.quotation." . ($step === 5 ? "store" : "next")) }}">
                    @csrf

                    <input type="number" name="step" value="{{ $step }}" class="d-none">
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
                                <select class="form-control" name="mainCoverage" id="mainCoverage" required>
                                    <option disabled>Choose...</option>
                                    <option>TLO</option>
                                    <option>Comprehensive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Brand</b></label>
                                <select class="form-control" name="vehicleBrand" id="vehicleBrand" required>
                                    <option disabled>Choose</option>
                                    <option value="toyota">Toyota</option>
                                    <option value="honda">Honda</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Model</b></label>
                                <select class="form-control" name="vehicleModel" id="vehicleModel" required>
                                    <option disabled>Choose</option>
                                    <option value="All New Avanza 1.3 E MT">All New Avanza 1.3 E MT</option>
                                    <option value="All New HR-V S CVT">All New HR-V S CVT</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Type</b></label>
                                <select class="form-control" name="vehicleType" id="vehicleType" required>
                                    <option disabled>Choose</option>
                                    <option value="avanza">Avanza</option>
                                    <option value="hr-v">HR-V</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Passenger Seat</b></label>
                                <input type="text" class="form-control" name="pSeat" id="pSeat"
                                       placeholder="(Not including driver's seat)" value="5"
                                       style="background-color: #e9ecef" readonly>
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Built Year</b></label>
                                <select class="form-control" name="vby" id="vby" required>
                                    <option selected="selected">2022</option>
                                    <option value="2022">2023</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>License Plate</b></label>
                                <select class="form-control" name="plat" id="plat" required>
                                    <option selected>B</option>
                                    <option value="A">D</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><b>Vehicle Sum Insured</b></label>
                                <div class="input-group">
                                    <select class="form-control col-1" name="curr" id="curr" aria-expanded="false"
                                            required>
                                        <option selected>IDR</option>
                                        <option>SGD</option>
                                        <option>USD</option>
                                    </select>
                                    <input type="text" class="form-control" name="vsi" id="vsi"
                                           placeholder="Automatic Input" value="364.900.000">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-footer">
                        <div class="button-row d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $('#reservation').daterangepicker()
    </script>
@endsection
