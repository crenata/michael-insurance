@extends("layouts.app")

@section("title")
    Register User
@endsection

@section("breadcrumb")
    <li class="breadcrumb-item active">Register User</li>
@endsection

@section("content")
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Register') }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form class="card-body" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input
                    id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    autofocus
                >

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>

                <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                >

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                <input
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    autocomplete="new-password"
                >

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div class="form-group">
                <label for="type">{{ __("Type") }}</label>
                <select
                    id="type"
                    class="form-select @error("type") is-invalid @enderror"
                    name="type"
                    required
                    autocomplete="type"
                    autofocus
                >
                    <option>Choose Type</option>
                    @foreach([
                        ["id" => "admin", "name" => "Admin"],
                        ["id" => "broker", "name" => "Broker"],
                        ["id" => "underwriting", "name" => "Underwriting"],
                        ["id" => "policy", "name" => "Policy Processor"]
                    ] as $type)
                        <option value="{{ $type["id"] }}" {{ $type["id"] === old("type") ? "selected" : "" }}>{{ $type["name"] }}</option>
                    @endforeach
                </select>
                @error("type")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="branch_id">{{ __("Branch") }}</label>
                <select
                    id="branch_id"
                    class="form-select @error("branch_id") is-invalid @enderror"
                    name="branch_id"
                    required
                    autocomplete="branch_id"
                    autofocus
                >
                    <option>Choose Branch</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $branch->id === old("branch_id") ? "selected" : "" }}>{{ $branch->name }}</option>
                    @endforeach
                </select>
                @error("branch_id")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
@endsection
