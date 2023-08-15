<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller {
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
        return view("broker.discount.add")->withData(0)->withStep(1);
    }

    /**
     * Store a newly created resource in storages.
     */
    public function store(Request $request) {
        $startDate = explode(" - ", $request->reservation)[0];
        $endDate = explode(" - ", $request->reservation)[1];
        $request->request->set("start_date", $startDate);
        $request->request->set("end_date", $endDate);

        $this->validate($request, [
            "name" => "required|string",
            "reservation" => "required|string",
            "start_date" => "required|string|date",
            "end_date" => "required|string|date",
            "percentage" => "required|numeric"
        ]);

        Discount::create([
            "name" => $request->name,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "percentage" => $request->percentage
        ]);

        return back()->withStatus("Successfully added.");
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
