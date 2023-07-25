@extends("layouts.app")

@section("title")
    Add Discount
@endsection

@section("breadcrumb")
    <li class="breadcrumb-item active">Add Discount</li>
@endsection

@section("content")
    @if (session("status"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("status") }}
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Discount</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form class="card-body" method="POST" action="{{ route("broker.discount.store") }}">
            @csrf

            <div class="form-group">
                <label for="name">Discount Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error("name") is-invalid @enderror"
                    required
                >
                @error("name")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input
                            type="text"
                            class="form-control @error("reservation") is-invalid @enderror float-right"
                            name="reservation"
                            id="reservation"
                            required
                        >
                        @error("reservation")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="percentage">Discount Percentage</label>
                <input
                    type="number"
                    id="percentage"
                    name="percentage"
                    class="form-control @error("percentage") is-invalid @enderror"
                    required
                >
                @error("percentage")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection

@section("script")
    <script>
        $("#reservation").daterangepicker();
    </script>
@endsection
