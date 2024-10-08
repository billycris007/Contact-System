@extends('layouts/app')

@section('layoutContent')
<div class="mt-2 h-100 d-flex justify-content-center align-items-center ">
    <div class="card p-5 w-75">
        <div class="col-md-12 row">
            <div class="col-md-8">
                <h3>Contact System</h3>
            </div>
            <div class="col-md-4 text-end">
                <span><a href="{{route('contact.form')}}">Add Contact</a></span> |
                <span><a href="{{route('contacts')}}">Contacts</a></span> |
                <span><a href="{{route('logout')}}">Logout</a></span>
            </div>
        </div>
        <div class="my-3">
            <input id="search" type="text" class="form-control" placeHolder="Search">
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="contact-body">
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->company}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <span><a href="{{route('contact.edit-form', ['id' => $contact->id])}}">Edit</a></span>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('contact.destroy', ['id' => $contact->id]) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                    </td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</div>
<script>
$('#search').keypress(function(e) {
    var key = e.which;
    if (key == 13) {
        const keyword = $(this).val();
        const url = `/search?keyword=${keyword}`
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                $("#contact-body").empty();
                if(response.contacts.length > 0){
                    response.contacts.forEach(function(contact) {
                        $("#contact-body").append(
                            `<tr>
                                <td>${contact.name}</td>
                                <td>${contact.company}</td>
                                <td>${contact.phone}</td>
                                <td>${contact.email}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><a href="/contact/edit-form/${contact.id}">Edit</a></span>
                                        </div>
                                        <div class="col-md-6">
                                            <form method="POST" action="/contact/destroy/${contact.id}" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>`
                        );
                    });
                }else{
                    $("#contact-body").append(`<tr><td colspan=5>No Results Found</td></tr>`)
                }
            },
            error: function(xhr) {
                // Handle error response
                console.log(xhr.responseText);
            }
        });
    }
});
</script>
@endsection