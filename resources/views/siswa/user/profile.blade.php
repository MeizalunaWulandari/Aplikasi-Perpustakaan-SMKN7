@extends('layout.template_siswa')
@extends('layout.template_userpage')

@section('content')
@section('user')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Profile</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Name" readonly
                    value="{{ Auth::guard('websiswa')->user()->nama }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Username"
                    readonly value="{{ Auth::guard('websiswa')->user()->username }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="+628**********"
                    value="{{ Auth::guard('websiswa')->user()->phone_number }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
@endsection
@endsection
