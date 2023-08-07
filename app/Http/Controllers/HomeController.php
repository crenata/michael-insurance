<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $quotations = Quotation::with("modifier")->orderByDesc("updated_at")->limit(7)->get();
        if (auth()->user()->type === "broker") return view("broker.home")->withQuotations($quotations);
        else if (auth()->user()->type === "underwriting") return view("underwriting.home")->withQuotations($quotations);
        else return view("policy.home")->withQuotations($quotations);
    }

    public function flow() {
        $quotations = Quotation::with("modifier")->orderByDesc("updated_at")->get();
        return view("quotation.view")->withQuotations($quotations)->withTitle("View Quotation Flow");
    }

    public function created() {
        $quotations = Quotation::with("modifier")->orderByDesc("updated_at")->get();
        return view("quotation.view")->withQuotations($quotations)->withTitle("View Created Quotation");
    }

    public function rejected() {
        $quotations = Quotation::with("modifier")->where("status", "Rejected by UW")->orderByDesc("updated_at")->get();
        return view("quotation.view")->withQuotations($quotations)->withTitle("View Rejected Quotation");
    }

    public function chart() {
        $quotations = Quotation::selectRaw(implode(",", [
            env("DB_CONNECTION") === "mysql" ?
                "date_format(updated_at, '%M') as label" /*mysql*/ :
                "to_char(updated_at, 'Mon') as label" /*postgresql*/,
            "extract(month from updated_at) as month",
            "extract(year from updated_at) as year",
            env("DB_CONNECTION") === "mysql" ?
                "count(case status when 'Issued' then 1 else 0 end) as issued" /*mysql*/ :
                "count(1) filter (where status = 'Issued') as issued" /*postgresql*/ ,
            env("DB_CONNECTION") === "mysql" ?
                "count(case status when 'Deleted' then 1 else 0 end) as issued" /*mysql*/ :
                "count(1) filter (where status = 'Deleted') as deleted" /*postgresql*/
        ]))->whereRaw(implode(",", [
            "extract(year from updated_at) = " . Carbon::now()->year
        ]))
            ->groupByRaw("1,2,3")
            ->orderBy("month")
            ->get();

        $labels = [];
        $issued = [];
        $deleted = [];
        foreach ($quotations as $quotation) {
            array_push($labels, $quotation->label);
            array_push($issued, (int) $quotation->issued);
            array_push($deleted, (int) $quotation->deleted);
        }

        return view("quotation.chart")->withLabels($labels)->withIssued($issued)->withDeleted($deleted);
    }
}
