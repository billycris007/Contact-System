@extends('layouts/app')

@section('title', 'Login')

@section('layoutContent')
<div class=" h-100 d-flex justify-content-center align-items-center login">
    <form action="{{route('register-save')}}" method="POST">
        @csrf
        <div class="card p-5">
            <div class="mb-3 col-md-12 text-center">
                <h3>Contact System Registration</h3>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="name" class="form-label">Name</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="name" name="name" required  value="{{ old('name') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="email" class="form-label">Email Address</label>
                </div>
                <div class="col-md-7">
                    <input type="email" class="form-control" id="email" name="email" required  value="{{ old('email') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="col-md-7">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                </div>
                <div class="col-md-7">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-3 row">
                <div class="col-md-5">
                    <a href="{{ route('login-form') }}">Back</a>
                </div>
                <div class="col-md-7">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection