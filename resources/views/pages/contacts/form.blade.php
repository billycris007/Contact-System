@extends('layouts/app')

@section('layoutContent')
<div class=" h-100 d-flex justify-content-center align-items-center login">
    <form 
        action="{{ isset($contact) ? route('contact.update', ['id' => $contact->id]) : route('contacts.store') }}"
        method="POST">
        @csrf
        <div class="card p-5" >
            <div class="mb-3 col-md-12 text-center">
                <h3>{{(isset($contact)? 'Edit': 'Add')}} Contact</h3>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="name" class="form-label">Name</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="name" name="name" required  value="{{ isset($contact) ? $contact->name : old('name') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="name" class="form-label">Company</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="company" name="company" value="{{ isset($contact) ? $contact->company : old('company') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="name" class="form-label">Phone</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="phone" name="phone"  value="{{ isset($contact) ? $contact->phone : old('phone') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="col-md-7">
                    <input type="email" class="form-control" id="email" name="email"  value="{{ isset($contact) ? $contact->email : old('email') }}">
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