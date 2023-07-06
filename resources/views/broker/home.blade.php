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
                    <h3><sup style="font-size: 25px">Create Quotation</sup></h3>
                    <p>Creating a new quotation</p>
                </div>
                <div class="icon">
                    <i class="ion-android-create"></i>
                </div>
                <a href="{{ route("broker.quotation.create") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><sup style="font-size: 25px">View Created Quotation</sup></h3>
                    <p>View quotations that has been made</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-grid-view"></i>
                </div>
                <a href="{{ route("broker.quotation.index") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><sup style="font-size: 25px">View Rejected Quotations</sup></h3>
                    <p>View quotations that has been rejected</p>
                </div>
                <div class="icon">
                    <i class="ion-android-delete"></i>
                </div>
                <a href="{{ route("broker.quotation.rejected") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3><sup style="font-size: 25px">Add Discount</sup></h3>
                    <p>Add products discount</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><sup style="font-size: 25px">Traffic Graph</sup></h3>
                    <p>View how many data has been made in graphs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
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
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Michael</td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">Motor Vehicle</div>
                                </td>
                                <td><span class="badge badge-success">Shipped</span></td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                <td>Brian</td>
                                <td>
                                    <div class="sparkbar" data-color="#f39c12" data-height="20">Motor Vehicle</div>
                                </td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>Dodit</td>
                                <td>
                                    <div class="sparkbar" data-color="#f56954" data-height="20">Fire</div>
                                </td>
                                <td><span class="badge badge-danger">Delivered</span></td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>Amir</td>
                                <td>
                                    <div class="sparkbar" data-color="#00c0ef" data-height="20">Motor Vehicle</div>
                                </td>
                                <td><span class="badge badge-info">Processing</span></td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                <td>Selya</td>
                                <td>
                                    <div class="sparkbar" data-color="#f39c12" data-height="20">Motor Vehicle</div>
                                </td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>John</td>
                                <td>
                                    <div class="sparkbar" data-color="#f56954" data-height="20">Fire</div>
                                </td>
                                <td><span class="badge badge-danger">Delivered</span></td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Wanda</td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">Motor Vehicle</div>
                                </td>
                                <td><span class="badge badge-success">Shipped</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route("broker.quotation.create") }}" class="btn btn-sm btn-info float-left">Add New Quotation</a>
                    <a href="{{ route("broker.quotation.index") }}" class="btn btn-sm btn-secondary float-right">View All Quotation</a>
                </div>
            </div>
        </section>
    </div>
@endsection