@extends("layouts.app")

@section("title")
    Welcome, {{ auth()->user()->name }}!
@endsection

@section("breadcrumb")
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><sup style="font-size: 25px">Review Quotation</sup></h3>
                    <p>Review a quotation made by marketer</p>
                </div>
                <div class="icon">
                    <i class="ion-android-create"></i>
                </div>
                <a href="{{ route("underwriting.quotation.review") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><sup style="font-size: 25px">View Quotation Flow</sup></h3>
                    <p>View quotation's journey</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-grid-view"></i>
                </div>
                <a href="{{ route("quotation.created") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Quotations</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Quotation ID</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotations as $quotation)
                                <tr>
                                    <td>{{ $quotation->no_quotation }}</td>
                                    <td>{{ $quotation->name }}</td>
                                    <td>{{ $quotation->cob }}</td>
                                    <td>
                                        <span class="badge
                                        @if($quotation->status === "Transfer to UW") badge-info
                                        @elseif($quotation->status === "Rejected by UW") badge-warning
                                        @elseif($quotation->status === "Approved by UW") badge-success
                                        @elseif($quotation->status === "Deleted") badge-danger
                                        @elseif($quotation->status === "Issued") badge-primary
                                        @endif"
                                        >{{ $quotation->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route("quotation.flow") }}" class="btn btn-sm btn-secondary float-right">View All Quotation</a>
                </div>
            </div>
        </section>
    </div>
@endsection
