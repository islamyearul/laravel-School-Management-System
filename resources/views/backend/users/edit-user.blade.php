

@extends('backend/layouts/master')
@section('edit-user')
<section class="content">
    <h1>Edit User Profile</h1><hr><hr>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('/admin/user-update/'.$editusersData->id) }}" enctype="multipart/form-data" method="POST">
      @csrf
    
      <div class="form-group">
        <label for=""> Name</label>
        <input type="text" value="{{$editusersData->name}}" name="name" class="form-control">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for=""> Email</label>
        <input type="email" value="{{$editusersData->email}}" name="email" class="form-control">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for=""> Role</label>
        <select name="role" id="" class="form-control">
          <option value="{{$editusersData->role}}" >{{$editusersData->role}}</option>
          @if (Auth::user()->role == 'administrator' )
          <option value="manager" >manager</option>
          <option value="user" >user</option>
          {{-- {{$editusersData->role=='user' ? 'selected' }}  --}}
          <option value="editor" >editor</option>
          <option value="programmer" >programmer</option>
          <option value="designer" >designer</option>
          <option value="administrator" >administrator</option>
          @endif
          
        </select>
        <label for=""> Email</label>
    
      </div>
      <div class="form-group">
        <div>
          <img class="img-fluid img-thumbnail img-responsive" style="width: 50px" src="{{ asset('storage/images/'.$editusersData->profile_photo_path) }}" alt="{{ $editusersData->profile_photo_path }}">
        </div>
        <label for=""> Image</label>
        <input type="file" name="photo" class="form-control">
        @error('photo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>
      <div class="form-group">
        <input type="submit" value="Update" class=" btn btn-primary btn-block">
      </div>
    
    </form>
   
       
    </div>
</section>

@endsection
