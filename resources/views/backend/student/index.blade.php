@extends('backend/layouts/master')
@section('student')

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">All Students</h4>
                        {{-- @if (Auth::user()->role == '') --}}
                            <a href="{{ url('admin/student/create') }}" class="btn btn-info float-right">Add Student</a>
                        {{-- @endif --}}
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            @if (session('success'))
                                <h3 class="alert alert-success">{{ session('success') }}</h3>
                            @endif
                            <table id="complex_header" class="text-white table table-bordered display" style="width:100%">
                                <thead>

                                    <tr>
                                        <th>SL </th>
                                        <th>Name</th>
                                        <th>Std ID </th>
                                        <th>Class Roll</th>
                                        <th>Father</th>
                                        <th>Mother</th>
                                        <th>Class</th>
                                        <th>Shift</th>
                                        <th>Session</th>
                                        <th>Group</th>
                                        <th>Gender</th>
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>Mobile</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Studentsdatas as $Studentsdata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>                                                                                 
                                            <td>{{ $Studentsdata->name }}</td>
                                            <td>{{ $Studentsdata->std_id }}</td>
                                            <td>{{ $Studentsdata->class_roll }}</td>
                                            <td>{{ $Studentsdata->f_name }}</td>
                                            <td>{{ $Studentsdata->m_name }}</td>
                                            <td>{{ $Studentsdata->class }}</td>
                                            <td>{{ $Studentsdata->shift }}</td>
                                            <td>{{ $Studentsdata->session }}</td>
                                            <td>{{ $Studentsdata->group }}</td>
                                            <td>{{ $Studentsdata->gender }}</td>
                                            <td>{{ $Studentsdata->p_address }}</td>
                                            <td>{{ $Studentsdata->per_address }}</td>
                                            <td>{{ $Studentsdata->mobile }}</td>
                                            <td>{{ $Studentsdata->phone }}</td>
                                            <td>{{ $Studentsdata->b_date }}</td>
                                            <td><img class="img-fluid img-thumbnail img-responsive" style="width: 50px" src="{{ asset('storage/images/students/'.$Studentsdata->photo) }}" alt="{{ $Studentsdata->photo }}"></td>

                                            <td>
                                                <a href="{{ URL::to('admin/student/' . $Studentsdata->id . '/edit') }}"
                                                    class="btn btn-primary">Edit
                                                </a>                                       
                                                <form action="{{ URL::to('admin/student/' . $Studentsdata->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" onclick="return confirm('Are You Sure?')"
                                                        class="btn btn-danger" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
