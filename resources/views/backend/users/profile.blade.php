

@extends('backend/layouts/master')
@section('profile')
<section class="content">
    <h1>User Profile</h1><hr><hr>

    <img src="{{$userData->profile_photo_path}}" alt="{{$userData->name}}"><br>
    <button id="editUserImage" class="btn btn-primary" >Edit Image</button><hr>
    <h3> Name: {{$userData->name}}</h3>
    <button class="btn btn-primary" >Edit Name</button><hr>
    <h3> Email: {{$userData->email}}</h3>
    <button class="btn btn-primary" >Edit Email</button><hr>

   
       
    </div>
</section>

@endsection
