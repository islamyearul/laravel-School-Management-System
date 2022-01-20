@extends('backend/layouts/master')
@section('exam')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('success'))
                <h3 class="alert alert-success">{{ session('success') }}</h3>
            @endif
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Exam List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Exam Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Examsdatas as $Examsdata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $Examsdata->exam_name }}</td>
                                            <td>
                                                <a
                                                    href="{{ URL::to('admin/exam/' . $Examsdata->id . '/edit') }}">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ URL::to('admin/exam/' . $Examsdata->id) }}"
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
                    <!-- /.box-body -->
                </div>

            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Exam</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('exam.store') }}">
                            @csrf
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Name</label>
                                <input type="text" class="form-control" value="{{ old('exam_name') }}" name="exam_name"
                                    placeholder="Enter ...">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value='Add Exam'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
