<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuotationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    public function rejected() {
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
        $request->merge(empty($request->data) ? [] : json_decode($request->data, true));
        $request->request->remove("_token");
        $request->request->remove("step");
        $request->request->remove("data");
        if ($step === 1) {
            $this->validate($request, [
                "name" => "required|string",
                "address" => "required|string",
                "kelurahan" => "required|string",
                "kecamatan" => "required|string",
                "city" => "required|string",
                "province" => "required|string",
                "reservation" => "required|string"
            ]);
        } else if ($step === 2) {
            $this->validate($request, [
                "cob" => ["required", "string", Rule::in(["Fire", "Motor Vehicle"])]
            ]);
        }

        return view("broker.quotation.add")->withData($request->all())->withStep($step + 1);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required|string",
            "cob" => ["required", "string", Rule::in(["Fire", "Motor Vehicle"])],
            "address" => "required|string",
            "kelurahan" => "required|string",
            "kecamatan" => "required|string",
            "city" => "required|string",
            "province" => "required|string",
            "reservation" => "required|string",
        ]);

        Quotation::create([
            "name" => $request->name
        ]);

        return redirect()->route("city.index")->withStatus("Successfully added.");
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
