<?php

namespace App\Http\Controllers\Underwriting;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller {
    public function review() {
        $quotations = Quotation::with("modifier")
            ->where("status", "Transfer to UW")
            ->orderByDesc("updated_at")
            ->get();
        return view("quotation.view")
            ->withQuotations($quotations)
            ->withTitle("Review Quotation");
    }

    public function reject(Request $request, $id) {
        Quotation::findOrFail($id)->update([
            "status" => "Rejected by UW",
            "modifier_id" => auth()->id()
        ]);
        return back();
    }

    public function accept(Request $request, $id) {
        Quotation::findOrFail($id)->update([
            "status" => "Approved by UW",
            "modifier_id" => auth()->id()
        ]);
        return back();
    }
}
