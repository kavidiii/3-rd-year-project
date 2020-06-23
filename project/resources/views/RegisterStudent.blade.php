@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Contacts</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>User_ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Date_Of_Birth</td>
          <td>Age</td>
          <td>Phone_No</td>
          <td>Address</td>
          <td>NIC</td>
          <td>Gender</td>
          <td>Free_Days</td>
          <td>License</td>
          <td colspan = 2>Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{$contact->user_id}}</td>
            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->date_of_birth }}</td>
            <td>{{$contact->age}}</td>
            <td>{{$contact->phoneno}}</td>
            <td>{{$contact->address}}</td>
            <td>{{$contact->NIC }}</td>
            <td>{{$contact->gender }}</td>
            <td>{{$contact->freeDay }}</td>
            <td>{{$contact->license }}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact->user_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->user_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
  </table>
<div>
</div>
@endsection  
    