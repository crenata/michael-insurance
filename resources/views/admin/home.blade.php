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
                    <h3><sup style="font-size: 25px">Register User</sup></h3>
                    <p>Register user</p>
                </div>
                <div class="icon">
                    <i class="ion-android-create"></i>
                </div>
                <a href="{{ route("register") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><sup style="font-size: 25px">Registered User List</sup></h3>
                    <p>Registered user list</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-grid-view"></i>
                </div>
                <a href="{{ route("users") }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
