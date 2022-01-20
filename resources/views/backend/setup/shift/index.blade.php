@extends('backend/layouts/master')
@section('shift')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('success'))
            <h3 class="alert alert-success">{{ session('success') }}</h3>
        @endif
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Shift List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Shift</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Shiftssdata as $Shiftsdata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $Shiftsdata->shift_name }}</td>                                   
                                            <td>

                                                <a href="{{ URL::to('admin/shift/'.$Shiftsdata->id.'/edit') }}">Edit</a> 


                                            </td>
                                            <td>
                                                <form action="{{ URL::to('admin/shift/' . $Shiftsdata->id) }}" method="POST">
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
                    <!-- /.box-body -->
                </div>

            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Shift</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('shift.store') }}">
                            @csrf
                            <!-- text input -->
                            <div class="form-group">
                                <label>Shift</label>
                                <input type="text" class="form-control" name="shift_name" placeholder="Enter ...">

                                @error('shift_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <input type="submit" class="btn btn-success" value='Shift'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
