@extends('backend/layouts/master')
@section('year')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('success'))
            <h3 class="alert alert-success">{{ session('success') }}</h3>
        @endif
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Session List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Year</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sessiondatas as $sessiondata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sessiondata->edu_session }}</td>                                   
                                            <td>

                                                <a href="{{ URL::to('admin/session/'.$sessiondata->id.'/edit') }}">Edit</a> 


                                            </td>
                                            <td>
                                                <form action="{{ URL::to('admin/session/' . $sessiondata->id) }}" method="POST">
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
                        <h4 class="box-title">Add Session</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('session.store') }}">
                            @csrf
                            <!-- text input -->
                            <div class="form-group">
                                <label>Session</label>
                                <input type="number" class="form-control" name="edu_session" placeholder="Enter ...">

                                @error('edu_session')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <input type="submit" class="btn btn-success" value='Session'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
