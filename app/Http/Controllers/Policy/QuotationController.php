<?php

namespace App\Http\Controllers\Policy;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller {
    public function review() {
        $quotations = Quotation::with("modifier")
            ->where("status", "Approved to UW")
            ->orderByDesc("updated_at")
            ->get();
        return view("quotation.view")
            ->withQuotations($quotations)
            ->withTitle("Issue Policy");
    }
}
