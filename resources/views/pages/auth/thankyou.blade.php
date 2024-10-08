@extends('layouts/app')

@section('title', 'Login')

@section('layoutContent')
<div class=" h-100 d-flex justify-content-center align-items-center login">
    <div class="card p-5">
        <div class="mb-3 row">
            <h1>Thank your for registering</h1>
        </div>
        <div class="mb-3 row">
            <div class="d-grid gap-2 d-md-flex justify-content-center">
                <a href="{{ route('contacts') }}" class="btn btn-primary">Continue</a>
            </div>
        </div>
    </div>
</div>
@endsection