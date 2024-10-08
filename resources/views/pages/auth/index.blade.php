@extends('layouts/app')

@section('title', 'Login')

@section('layoutContent')
<div class=" h-100 d-flex justify-content-center align-items-center login">
    <form 
        action="{{ route('login') }}"
        method="POST">
        @csrf
        <div class="card p-5">
            <div class="mb-3 col-md-12 text-center">
                <h3>Contact System</h3>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                </div>
                <div class="col-md-7">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                </div>
                <div class="col-md-7">
                    <input type="password"  name="password" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <a href="{{route('register-form')}}">Register Now</a>
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