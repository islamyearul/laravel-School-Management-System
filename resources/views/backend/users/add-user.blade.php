@extends('backend/layouts/master')
@section('add-user')
    <!-- Main content -->
    <section class="content">
        <h1>Add User Profile</h1>
        <hr>
        <hr>
        @error('success')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ url('/admin/user-store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for=""> Name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Email</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Role</label>
                <select name="role" id="" class="form-control">
                    <option value="user">user</option>
                    @if (Auth::user()->role == 'administrator')
                        <option value="manager">manager</option>
                        <option value="user">user</option>
                        <option value="editor">editor</option>
                        <option value="programmer">programmer</option>
                        <option value="designer">designer</option>
                        <option value="administrator">administrator</option>
                    @endif

                </select>

            </div>
            <div class="form-group">
                <label for=""> Image</label>
                <input type="file" name="photo" class="form-control">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <input type="submit" value="Add" class=" btn btn-primary btn-block">
            </div>

        </form>


        </div>
    </section>

@endsection
