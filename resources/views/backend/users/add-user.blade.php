@extends('backend/layouts/master')
@section('add-user')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">{{ collect(request()->segments())->last() }}</h3>
                <div class="d-inline-block align-items-center">
                    <a href="/"><i class="mdi mdi-home-outline"></i></a> >
                    <?php $link = ''; ?>
                    @for ($i = 1; $i <= count(Request::segments()); $i++)
                        @if (($i < count(Request::segments())) & ($i> 0))
                            <?php $link .= '/' . Request::segment($i); ?>
                            <a href="<?= $link ?>">{{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a> >
                        @else {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
                    @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <h1>Add User Profile</h1>
        <hr>
        <hr>
        @error('title')
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
                <input type="submit" value="Update" class=" btn btn-primary btn-block">
            </div>

        </form>


        </div>
    </section>

@endsection
