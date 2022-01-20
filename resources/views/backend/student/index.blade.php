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
                                        <th>Class Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($Classdata as $Clasdata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                        
                                            <td>{{ $Clasdata->class_name }}</td>

                                            <td>
                                                <a href="{{ URL::to('admin/class/' . $Clasdata->id . '/edit') }}"
                                                    class="btn btn-primary">Edit
                                                </a>                                       
                                            </td>
                                            <td>
                                                <form action="{{ URL::to('admin/class/' . $Clasdata->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" onclick="return confirm('Are You Sure?')"
                                                        class="btn btn-danger" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
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
