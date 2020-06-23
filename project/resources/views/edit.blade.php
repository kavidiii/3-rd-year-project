@extends('base') 
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a contact</h1>
  
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    
      <form method="post" action="{{route('contacts.update',$contact->user_id)}}">
      
          @method('PATCH') 
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"value={{$contact->first_name}}/>
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"value={{$contact->last_name}}/>
          </div>
          <div class="form-group">
              <label for="last_name">Email:</label>
              <input type="text" class="form-control" name="email"value={{$contact->email}}/>
          </div>
          <div class="form-group">
              <label for="date_of_birth">Date_of_birth:</label>
              <input type="date" class="form-control" name="date_of_birth"value={{$contact->date_of_birth}}/>
          </div>
          <div class="form-group">
              <label for="age">Age:</label>
              <input type="number" class="form-control" name="age"value={{$contact->age}}/>
          </div>
          <div class="form-group">
              <label for="phone No:">Phone No:</label>
              <input type="number" class="form-control" name="phoneno"value={{$contact->phoneno}}/>
          </div>
          <div class="form-group">
              <label for="Address">Address:</label>
              <input type="text" class="form-control" name="address"value={{$contact->address}}/>
          </div>
          <div class="form-group">
              <label for="NIC">NIC:</label>
              <input type="text" class="form-control" name="NIC"value={{$contact->NIC}}/>
          </div>
          <div class="form-group">
              <label for="gender">Gender:</label>
              <input type="text" class="form-control" name="gender"value={{$contact->gender}}/>
          </div>
          <div class="form-group">
              <label for="free days">Free Days:</label>
              <input type="text" class="form-control" name="freeDay"value={{$contact->freeDay}}/>
          </div> 
          <div class="form-group">
              <label for="license">License:</label>
              <input type="text" class="form-control" name="license"value={{$contact->license}}/>
          </div>                        
          <button type="submit" class="btn btn-primary-outline">Add contact</button>
      </form>
  
</div>
</div>
@endsection
