<?php

namespace App\Http\Controllers\Broker;

use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\CoverageRate;
use App\Models\Plat;
use App\Models\Quotation;
use App\Models\TsiRate;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class QuotationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view("broker.quotation.add")->withData(0)->withStep(1);
    }

    public function next(Request $request) {
        $this->validate($request, [
            "step" => "required|numeric"
        ]);
        $step = $request->integer("step");
        $brandValue = $request->integer("brand");
        $modelValue = $request->integer("model");
        $typeValue = $request->integer("type");
        $seatValue = $request->integer("seat");
        $yearValue = $request->integer("year");
        $platValue = $request->integer("plat");
        $vsiValue = $request->integer("vsi");

        $request->merge(empty($request->data) ? [] : json_decode($request->data, true));
        $request->request->remove("_token");
        $request->request->remove("step");
        $request->request->remove("data");

        $startDate = explode(" - ", $request->reservation)[0];
        $endDate = explode(" - ", $request->reservation)[1];

        if ($brandValue > 0) $request->request->set("brand", $brandValue);
        if ($modelValue > 0) $request->request->set("model", $modelValue);
        if ($typeValue > 0) $request->request->set("type", $typeValue);
        if ($seatValue > 0) $request->request->set("seat", $seatValue);
        if ($yearValue > 0) $request->request->set("year", $yearValue);
        if ($platValue > 0) $request->request->set("plat", $platValue);
        if ($vsiValue > 0) $request->request->set("vsi", $vsiValue);
        $request->request->set("start_date", $startDate);
        $request->request->set("end_date", $endDate);

        $plats = [];
        $brands = [];
        $models = [];
        $types = [];
        $message = null;

        if ($step === 1) {
            $validator = Validator::make($request->all(), [
                "name" => "required|string",
                "address" => "required|string",
                "kelurahan" => "required|string",
                "kecamatan" => "required|string",
                "city" => "required|string",
                "province" => "required|string",
                "reservation" => "required|string"
            ]);
            if ($validator->fails()) $message = $validator->errors()->first();
        } else if ($step === 2) {
            $validator = Validator::make($request->all(), [
                "cob" => ["required", "string", Rule::in(["Fire", "Motor Vehicle"])]
            ]);
            if ($validator->fails()) $message = $validator->errors()->first();

            $plats = Plat::orderBy("plat")->get();
            $brands = VehicleBrand::orderBy("name")->get();
            if ($request->integer("brand") > 0) $models = VehicleModel::where("brand_id", $request->integer("brand"))->orderBy("name")->get();
            if ($request->integer("model") > 0) $types = VehicleType::where("model_id", $request->integer("model"))->orderBy("name")->get();
        } else if ($step === 3) {
            $validator = Validator::make($request->all(), [
                "coverage" => ["required", "string", Rule::in(["TLO", "Comprehensive"])],
                "brand" => "required|numeric|exists:vehicle_brands,id",
                "model" => "required|numeric|exists:vehicle_models,id",
                "type" => "required|numeric|exists:vehicle_types,id",
                "plat" => "required|numeric|exists:plats,id",
                "vsi" => "required|numeric|min:1"
            ]);
            if ($validator->fails()) $message = $validator->errors()->first();
        } else if ($step === 4) {
            $this->validate($request, [
                "flood" => ["required", "string", Rule::in(["No", "Yes"])],
                "earthquake" => ["required", "string", Rule::in(["No", "Yes"])],
                "srcc" => ["required", "string", Rule::in(["No", "Yes"])],
                "tns" => ["required", "string", Rule::in(["No", "Yes"])],
                "others" => ["required", "string", Rule::in(["No", "Yes"])],
                "tpl" => ["required", "string", Rule::in(["No", "Yes"])],
                "tpl_limit" => "nullable|numeric|min:1",
                "tpl_to_passenger" => ["required", "string", Rule::in(["No", "Yes"])],
                "tpl_to_passenger_limit" => "nullable|numeric|min:1",
                "dpa" => ["required", "string", Rule::in(["No", "Yes"])],
                "dpa_limit" => "nullable|numeric|min:1",
                "ppa" => ["required", "string", Rule::in(["No", "Yes"])],
                "ppa_limit" => "nullable|numeric|min:1"
            ]);
        }

        if (!empty($message)) $step--;

        $rate = 0;
        if (
            !empty($request->coverage) &&
            !empty($request->integer("plat") > 0) &&
            !empty($request->integer("vsi") > 0)
        ) {
            $rate = CoverageRate::where("coverage", $request->coverage)
                ->where("zone", Plat::find($request->integer("plat"))->zone)
                ->where("category", TsiRate::where("min", "<=", $request->integer("vsi"))
                    ->where("max", ">=", $request->integer("vsi"))->first()->category)
                ->first()->rate;
        }

        return view("broker.quotation.add")
            ->withData($request->all())
            ->withStep($step + 1)
            ->withPlats($plats)
            ->withRate($rate)
            ->withDataPlat($request->integer("plat") > 0 ? Plat::find($request->integer("plat")) : (object) [
                "plat" => ""
            ])
            ->withBrands($brands)
            ->withDataBrand($request->integer("brand") > 0 ? VehicleBrand::find($request->integer("brand")) : (object) [
                "name" => ""
            ])
            ->withModels($models)
            ->withDataModel($request->integer("model") > 0 ? VehicleModel::find($request->integer("model")) : (object) [
                "name" => ""
            ])
            ->withTypes($types)
            ->withDataType($request->integer("type") > 0 ? VehicleType::find($request->integer("type")) : (object) [
                "name" => "",
                "seat" => "",
                "price" => "",
                "year" => ""
            ])
            ->withMessage($message);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->merge(empty($request->data) ? [] : json_decode($request->data, true));
        $request->request->set("vehicle_brand_id", $request->integer("brand"));
        $request->request->set("vehicle_model_id", $request->integer("model"));
        $request->request->set("vehicle_type_id", $request->integer("type"));
        $request->request->set("plat_id", $request->integer("plat"));
        $rate = CoverageRate::where("coverage", $request->coverage)
            ->where("zone", Plat::find($request->integer("plat"))->zone)
            ->where("category", TsiRate::where("min", "<=", $request->integer("vsi"))
                ->where("max", ">=", $request->integer("vsi"))->first()->category)
            ->first()->rate;
        $request->request->set("total_premium", $request->integer("vsi") * $rate / 100);
        $this->validate($request, [
            "name" => "required|string",
            "address" => "required|string",
            "kelurahan" => "required|string",
            "kecamatan" => "required|string",
            "city" => "required|string",
            "province" => "required|string",
            "start_date" => "required|string|date",
            "end_date" => "required|string|date",
            "cob" => ["required", "string", Rule::in(["Fire", "Motor Vehicle"])],
            "coverage" => ["required", "string", Rule::in(["TLO", "Comprehensive"])],
            "brand" => "required|numeric|exists:vehicle_brands,id",
            "model" => "required|numeric|exists:vehicle_models,id",
            "type" => "required|numeric|exists:vehicle_types,id",
            "plat" => "required|numeric|exists:plats,id",
            "vsi" => "required|numeric|min:1",
            "flood" => ["required", "string", Rule::in(["No", "Yes"])],
            "earthquake" => ["required", "string", Rule::in(["No", "Yes"])],
            "srcc" => ["required", "string", Rule::in(["No", "Yes"])],
            "tns" => ["required", "string", Rule::in(["No", "Yes"])],
            "others" => ["required", "string", Rule::in(["No", "Yes"])],
            "tpl" => ["required", "string", Rule::in(["No", "Yes"])],
            "tpl_limit" => "nullable|numeric|min:1",
            "tpl_to_passenger" => ["required", "string", Rule::in(["No", "Yes"])],
            "tpl_to_passenger_limit" => "nullable|numeric|min:1",
            "dpa" => ["required", "string", Rule::in(["No", "Yes"])],
            "dpa_limit" => "nullable|numeric|min:1",
            "ppa" => ["required", "string", Rule::in(["No", "Yes"])],
            "ppa_limit" => "nullable|numeric|min:1",
            "file" => "required|file"
        ]);

        return DB::transaction(function () use ($request) {
            $file = StorageHelper::save($request, "file", "quotations");
            $request->request->remove("file");
            $request->request->set("file", $file);
            $year = Carbon::now()->year;
            $branchId = auth()->user()->branch_id;
            $counter = Counter::where("year", $year)->where("branch_id", $branchId)->first();
            if (empty($counter->id)) {
                $counter = Counter::create([
                    "year" => $year,
                    "branch_id" => $branchId
                ]);
            }
            $counter->counter++;
            $counter->save();
            $request->request->set("no_quotation", $year . sprintf("%02d", $branchId) . sprintf("%04d", $counter->counter));
            $request->request->set("status", "Transfer to UW");
            $request->request->set("modifier_id", auth()->id());
            Quotation::create($request->all());

            return redirect()->route("broker.quotation.index")->withStatus("Successfully added.");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
