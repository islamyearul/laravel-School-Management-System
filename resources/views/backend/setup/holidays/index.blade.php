@extends('backend/layouts/master')
@section('holidays')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('success'))
            <h3 class="alert alert-success">{{ session('success') }}</h3>
        @endif
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Holidays List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Holidays Name</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Holidayssdata as $Holidaysdata)
                                        <tr>
                                            <td>{{ $Holidaysdata->id }}</td>
                                            <td>{{ $Holidaysdata->name }}</td>                                   
                                            <td>{{ $Holidaysdata->description }}</td>                                   
                                            <td>{{ $Holidaysdata->date }}</td>                                   
                                            <td>

                                                <a href="{{ URL::to('admin/holidays/'.$Holidaysdata->id.'/edit') }}">Edit</a> 


                                            </td>
                                            <td>
                                                <form action="{{ URL::to('admin/holidays/' . $Holidaysdata->id) }}" method="POST">
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
                        <h4 class="box-title">Add Holidays</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('holidays.store') }}">
                            @csrf
                            <!-- text input -->
                            <div class="form-group">
                                <label>Holidays Name</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter ...">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="5" placeholder="Enter ...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" value="{{ old('date') }}" class="form-control" name="date" placeholder="Enter ...">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <input type="submit" class="btn btn-success" value='Add Holidays'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
