<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (auth()->user()->type === "broker") return view("broker.home");
        else if (auth()->user()->type === "underwriting") return view("underwriting.home");
        else return view("policy.home");
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
}
