@extends("layouts.app")

@section("title")
    {{ $title }}
@endsection

@section("breadcrumb")
    <li class="breadcrumb-item active">{{ $title }}</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Quotation Number</th>
                            <th>Customer's Name</th>
                            <th>Registered Date</th>
                            <th>Period</th>
                            <th>Address</th>
                            <th>CoB</th>
                            <th>Currency</th>
                            <th>TSI</th>
                            <th>Premium Total</th>
                            <th>Status</th>
                            <th>Last Processed By</th>
                            @if(Route::is("underwriting.quotation.review") || Route::is("policy.quotation.review") || Route::is("quotation.rejected"))
                                <th>Action</th>
                            @endif
                            <th>PDF Files</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quotations as $quotation)
                            <tr>
                                <td><button type="button" class="btn btn-block btn-primary">{{ $quotation->no_quotation }}</button></td>
                                <td>{{ $quotation->name }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($quotation->created_at)->format("Y-m-d") }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($quotation->start_date)->format("Y-m-d") }} - {{ \Illuminate\Support\Carbon::parse($quotation->end_date)->format("Y-m-d") }}</td>
                                <td>{{ $quotation->address }}</td>
                                <td>{{ $quotation->cob }}</td>
                                <td>IDR</td>
                                <td>{{ number_format($quotation->vsi) }}</td>
                                <td>{{ number_format($quotation->total_premium) }}</td>
                                <td>{{ $quotation->status }}</td>
                                <td>{{ $quotation->modifier->email }}</td>
                                @if(Route::is("underwriting.quotation.review") || Route::is("policy.quotation.review") || Route::is("quotation.rejected"))
                                    @if(auth()->user()->type === "broker" && $quotation->status === "Rejected by UW")
                                        <td>
                                            <a href="{{ route("broker.quotation.delete", $quotation->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    @elseif(auth()->user()->type === "underwriting")
                                        <td>
                                            <a href="{{ route("underwriting.quotation.reject", $quotation->id) }}" class="btn btn-danger">Reject</a>
                                            <a href="{{ route("underwriting.quotation.accept", $quotation->id) }}" class="btn btn-primary mt-1">Accept</a>
                                        </td>
                                    @elseif(auth()->user()->type === "policy")
                                        <td>
                                            <a href="{{ route("policy.quotation.issue", $quotation->id) }}" class="btn btn-primary mt-1">Issue</a>
                                        </td>
                                    @endif
                                @endif
                                <td>
                                    @foreach ($quotation->files as $file)
                                        <a href="{{ $file->file }}" download>
                                            {{ str_replace(env("APP_URL") . "/storage/quotations/", "", $file->file) }}
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Quotation Number</th>
                            <th>Customer's Name</th>
                            <th>Registered Date</th>
                            <th>Period</th>
                            <th>Address</th>
                            <th>CoB</th>
                            <th>Currency</th>
                            <th>TSI</th>
                            <th>Premium Total</th>
                            <th>Status</th>
                            <th>Last Processed By</th>
                            @if(Route::is("underwriting.quotation.review") || Route::is("policy.quotation.review") || Route::is("quotation.rejected"))
                                <th>Action</th>
                            @endif
                            <th>PDF Files</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
