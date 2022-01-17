@extends('backend/layouts/master')
@section('users')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Data Tables</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">All User Data</h4>
                        @if (Auth::user()->role == 'administrator')
                        <a href="{{url('/admin/user-add')}}" class="btn btn-info float-right">Add User</a>
                        @endif
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            @if (session('success'))
                                <h3 class="alert alert-success">{{ session('success') }}</h3>
                            @endif
                            <table id="complex_header" class="text-white table table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allusersData as $alluserData)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alluserData->name }}</td>
                                            <td>{{ $alluserData->email }}</td>
											<td>
												<img class="img-fluid img-thumbnail img-responsive" style="width: 50px" src="{{ asset('storage/images/'.$alluserData->profile_photo_path) }}" alt="{{ $alluserData->profile_photo_path }}">
											</td>
                                            {{-- <td>{{ Str::limit($alluserData->profile_photo_path, 15, $end = '..') }}</td> --}}
                                            <td>{{ $alluserData->role }}</td>
                                            <td>
                                                <a href="{{ url('/admin/user-edit/' . $alluserData->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ $alluserData->email }}"
                                                    onclick="return confirm('Are You Sure?')"
                                                    class="btn btn-danger">Delete</a>
                                            </td>



                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Office</th>
                                        <th>Extn.</th>
                                        <th>E-mail</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


    {{-- <section class="content">
    <h1>User Profile</h1><hr><hr>

    <img src="{{$userData->profile_photo_path}}" alt="{{$userData->name}}"><br><hr>
    <h3> Name: {{$userData->name}}</h3><hr>
    <h3> Email: {{$userData->email}}</h3><hr>
    <a class="btn btn-primary" href="{{ url('/admin/profile/edit/'.$userData->id) }}" >Edit User</a><hr>

   
       
    </div>
</section> --}}

@endsection
