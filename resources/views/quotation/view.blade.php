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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quotations as $quotation)
                            <tr>
                                <td><button type="button" class="btn btn-block btn-primary">{{ $quotation->no_quotation }}</button></td>
                                <td>{{ $quotation->name }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($quotation->created_at)->format("Y-m-d") }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($quotation->created_at)->addYear()->format("Y-m-d") }}</td>
                                <td>{{ $quotation->address }}</td>
                                <td>{{ $quotation->cob }}</td>
                                <td>IDR</td>
                                <td>{{ number_format($quotation->vsi) }}</td>
                                <td>{{ number_format($quotation->total_premium) }}</td>
                                <td>{{ $quotation->status }}</td>
                                <td>{{ $quotation->modifier->email }}</td>
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
