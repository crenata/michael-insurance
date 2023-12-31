@extends("layouts.default")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __("Type") }}</label>
                                <div class="col-md-6">
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
                                            ["id" => "broker", "name" => "Broker"],
                                            ["id" => "underwriting", "name" => "Underwriting"],
                                            ["id" => "policy", "name" => "Policy Processor"],
                                            ["id" => "admin", "name" => "Admin"]
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
                            </div>

                            <div class="row mb-3">
                                <label for="branch_id" class="col-md-4 col-form-label text-md-end">{{ __("Branch") }}</label>
                                <div class="col-md-6">
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
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
